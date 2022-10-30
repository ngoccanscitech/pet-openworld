<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Wishlist;
use App\ShopOrderStatus;
use App\ShopOrderPaymentStatus;
use App\Product;

class WishlistController extends Controller
{
    use \App\Traits\LocalizeController;
    public $data = [
        'error' => false,
        'success' => false,
        'message' => ''
    ];

    public function __construct()
    {
        parent::__construct();
        $this->data['statusOrder']    = ShopOrderStatus::getIdAll();
        $this->data['orderPayment']    = ShopOrderPaymentStatus::getIdAll();

    }

    public function wishlist()
    {
        $this->data['seo'] = [
            'seo_title' => 'Wishlist'
        ];

        if(auth()->check()){
            $this->data['wishlist'] = Product::join('wishlist', 'wishlist.product_id', 'shop_products.id')->where('status', 1)->paginate(20);

            return view($this->templatePath .'.customer.wishlist', $this->data);
        }
        else
        {
            $wishlist = json_decode(\Cookie::get('wishlist'));

            if($wishlist != ''){
                $this->data['wishlist'] = \App\Product::whereIn('id', $wishlist)->get();
            }
            return view($this->templatePath .'.customer.wishlist', $this->data);
        }
    }

    public function addWishlist(Request $request)
    {
        $this->localized();

        $id = $request->id;
        $type = 'save';
        if(auth()->check()){
            $data_db = array(
                'product_id' => $id,
                'user_id' => auth()->user()->id,
            );

            $db = Wishlist::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
            if($db != ''){
                $db->delete();
                $type = 'remove';
            }
            else
                Wishlist::create($data_db)->save();

            $count_wishlist = \App\Model\Wishlist::where('user_id', auth()->user()->id)->count();
            $this->data['count_wishlist'] = $count_wishlist;
            $this->data['status'] = 'success';
        }
        else{
            $wishlist = json_decode(\Cookie::get('wishlist'));
            $key = false;
            

            if($wishlist != '')
                $key = array_search( $id, $wishlist);
            if($key !== false){
                unset($wishlist[$key]);
                $type = 'remove';
            }
            else{
                $wishlist[] = $id;
            }
            $this->data['count_wishlist'] = count($wishlist);
            $this->data['status'] = 'success';
            $cookie = \Cookie::queue('wishlist', json_encode($wishlist), 1000000000);
        }
        $this->data['type'] = $type;
        // $this->data['view'] = view('theme.product.includes.wishlist-icon', ['type'=>$type, 'id'=>$id])->render();
        
        return response()->json($this->data);
    }
}
