<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Libraries\Helpers;
use Illuminate\Support\Str;
use App\User;
use Auth, DB, File, Image, Redirect, Cache;
use App\Exports\CustomerExport;
use App\Exports\OrderExport;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\WebService\WebService;
use App\Model\ShopProduct;
use App\ShoppingCart;

class UserController extends Controller
{
	public function listUsers(){
        $data_user = User::orderByDesc('id')->get();
        return view('admin.users.index')->with(['data_user' => $data_user]);
    }

    public function exportCustomer(Request $rq){
        return (new CustomerExport())->download('customer.xlsx');
    }

    public function userDetail($id){
    	$user = User::find($id);
        $userCart = [];
        // dd($user);
        /*$cart = ShoppingCart::find($id);
        if($cart) {
            $userCart = $cart->content;
        }*/
    	return view('admin.users.detail', ['user' => $user]);
    }

    public function postUserDetail(Request $request){
    	$id = $request->id;
        $user = User::find($id);
        $change_pass = $request->check_pass ?? 0;

        if($change_pass){
            $this->validate($request,[
                'email' => 'required|unique:"'.User::class.'",email,' . $id . '',
                'password'      => 'required|confirmed',
                'fullname'          => 'required',
            ],[
                'email.required' => 'Địa chỉ Email không được trống',
                'email.email' => 'Địa chỉ Email không đúng định dạng',
                'email.unique' => 'Địa chỉ Email đã tồn tại',
                'password.required' => 'Hãy nhập mật khẩu',
                'password.confirmed' => 'Xác nhận mật khẩu không đúng',
                'fullname.required' => 'Tên không được trống',
            ]);
        }
        else{
            $this->validate($request,[
                'email' => 'required|string|max:50|unique:"'.User::class.'",email,' . $id . '',
                'fullname'          => 'required',
            ],[
                'email.required' => 'Hãy nhập vào địa chỉ Email',
                'email.email' => 'Địa chỉ Email không đúng định dạng',
                'email.unique' => 'Địa chỉ Email đã tồn tại',
                'fullname.required' => 'Tên không được trống',
            ]);
        }

        $name_field = "avatar_upload";
        if($request->avatar_upload){
            $image_folder="/upload/user/avatar/";

            $file = $request->file($name_field);
            $file_name = uniqid() . '-' . $file->getClientOriginalName();
            $name_avatar = $image_folder . $file_name;

            
            $file->move( public_path() . $image_folder, $file_name );
            if($user->avatar !='' && file_exists( public_path().$user->avatar )){
                // unlink($user->avatar) ;
                File::delete($user->avatar);
            }
        }else{
            $name_avatar = $user->avatar;
        }
        // dd($user);
        $type = $request['member_type'];
        $wallet = $request->wallet ?? 0;
        $wallet = str_replace(',', '', $wallet);

        

        $dataUpdate = array(
            'expert' => $request->expert??0,
            'wallet' => $wallet,
            'slogan' => $request->slogan??'',
            'about_me' => htmlspecialchars($request->about_me??''),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'address' => $request->address ?? '',
            'province' => $request->state ?? '',
            'district' => $request->slt_district ?? '',
            'ward' => $request->slt_ward ?? '',
            'avatar' => $name_avatar,
            'phone' => $request->phone,
            'status' => $request->status ?? 0,
        );
        if($request->password)
            $dataUpdate['password']  = bcrypt($request->password);

        $respons = DB::table('users')->where("id", $id)->update($dataUpdate);

        $data_user_info = ($type == 'person') ? $request['person'] : $request['company'];
        
        if($data_user_info){
            \App\UserInfo::updateOrCreate(
                [ "user_id" => $id],
                $data_user_info
            );
        }
        $save = $request->submit;
        if($save=='apply'){
            $msg = "User has been Updated";
            $url = route('admin.userDetail', array($id));
            Helpers::msg_move_page($msg, $url);
        }
        else{
            return redirect(route('admin.listUsers'));
        }
        /*
        $msg = "Thông tin tài khoản đã được cập nhật";
        $url=  route('admin.userDetail', $id);
        Helpers::msg_move_page($msg,$url);*/
    }

    public function deleteUser($id)
    {
        $loadDelete = User::find($id)->delete();
        if($loadDelete){
            $productDelete = ShopProduct::all();
            foreach($productDelete as $value){
            if($value->admin_id==$id){
                    $value->delete();
                }
            }
            $userCart = ShoppingCart::find($id);
            if($userCart){
                $userCart->delete();
            }
        }
        
        $msg = "Customer account has been Delete";
        $url = route('admin.listUsers');
        Helpers::msg_move_page($msg,$url);
    }
}