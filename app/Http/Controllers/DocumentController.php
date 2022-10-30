<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File, Image;
use App\Model\Document, App\Page, App\Model\DocumentStatistical;

use App\Model\ShopEmailTemplate;
use App\Mail\SendMail;
use App\Jobs\Job_SendMail;

class DocumentController extends Controller
{
    use \App\Traits\LocalizeController;

    public function index()
    {
        $this->data['seo'] = [
            'seo_title' => 'Tài liệu',
            'seo_image' => '',
            'seo_description'   => '',
            'seo_keyword'   => '',

        ];
        if(request('download') != '')
        {
            $data_search = [
              'limit'   => 3,
           ];
           $best_downloads = (new \App\Model\DocumentStatistical)->getList($data_search);
        }
        else
        {
            $dataSearch = [
              'sort_order'   => request('sort')??''
            ];
            $this->data['posts'] = (new \App\Model\Document)->getList($dataSearch);
        }

        // $this->data['posts'] = (new Document)->where('status', 1)->paginate(20);
        return view($this->templatePath .'.document.index', $this->data);
    }

    public function categoryDetail($slug){
        $this->localized();
        $this->data['category'] = ResearchCategory::all();
        $category_current = ResearchCategory::where('slug', $slug)->first();
        if($category_current){
            $this->data['category_current'] = $category_current;
            $this->data['category_child'] = ResearchCategory::where('category_id', 1)->get();
            // $this->data['page'] = $this->data['current'];
            $this->data['posts'] = $this->data['category_current']->post()->where('status', 1)->paginate(20);

            $posts = ResearchCategory::find(1);
            $this->data['news_featured'] = $posts->post()->where('status', 1)->limit(3)->get();

            $this->data['seo'] = [
                'seo_title' => $category_current->seo_title!=''? $category_current->seo_title : $category_current->name,
                'seo_image' => $category_current->image,
                'seo_description'   => $category_current->seo_description ?? '',
                'seo_keyword'   => $category_current->seo_keyword ?? '',

            ];
            // dd($this->data['category_current']);
            return view($this->templatePath .'.document.index', $this->data);
        }
        else
            return $this->detail($slug);
    }
    
    public function detail($slug)
    {
        $this->localized();
        $post = (new Document)->getDetail($slug, $type = 'slug');
        if($post)
        {
            Document::find($post->id)->increment('view');
            (new DocumentStatistical)->statistical($post->id);
            $this->data['post'] = $post;
            $this->data['user'] = \App\User::find($post->user_id??0);

            $this->data['post_featured'] = (new Document)->where('status', 1)->where('id', '<>', $post->id)->limit(10)->get();

            $this->data['seo'] = [
                'seo_title' => $post->seo_title!=''? $post->seo_title : $post->name,
                'seo_image' => $post->image,
                'seo_description'   => $post->seo_description ?? '',
                'seo_keyword'   => $post->seo_keyword ?? '',

            ];
            // dd($this->data['seo']);
            return view($this->templatePath .'.document.single', $this->data);
        }
        return view('errors.404');
    }

    /*public function detail($slug)
    {
        $post = (new Document)->getDetail($slug, $type="slug");
    }*/

    public function upload()
    {
        $page = Page::find(94);
        $this->data['seo'] = [
           'seo_title' => $page->seo_title!=''? $page->seo_title : $page->title,
           'seo_image' => $page->image,
           'seo_description'   => $page->seo_description ?? '',
           'seo_keyword'   => $page->seo_keyword ?? '',

        ];
        $this->data['page'] = $page;
        return view($this->templatePath . '.document.upload', $this->data);
    }
    public function postUpload()
    {
        $public_folderPath = public_path('upload/files/');
        $folderPath = 'upload/files/';

        $data = request()->all();
        $user = auth()->user();

        /*if(isset($data['gallery']) && count($data['gallery']))
        {
            $files = request()->file("gallery");
            $year = date('Y');
            $m = date('m');
            $dir = $public_folderPath . $year;
            $dir_m = $folderPath . $year.'/'.$m;
            if (is_dir($dir) === false) {
                // dd($dir);
                mkdir($dir);
            }
            if (is_dir($dir_m) === false) {
                mkdir($dir_m);
            }

            foreach ($files as $key => $file) {
                $filename_original = $file->getClientOriginalName();
                $filename_ = pathinfo($filename_original, PATHINFO_FILENAME);
                $extension_ = pathinfo($filename_original, PATHINFO_EXTENSION);

                $file_slug = Str::slug($filename_);
                $file_name = uniqid() . '-' . $file_slug . '.' . $extension_;
                $img_name = '/' . $dir_m . '/' . $file_name;
                $gallery[] = $img_name;
                
                $file->move($dir_m, $file_name);

                if(in_array($extension_, ['bmp','gif','jpeg','jpg','JPG','png','PNG','svg'])){
                    $image = $img_name;
                }
            }

            $gallery = serialize($gallery);
        }*/
        if(isset($data['file']))
        {
            $file = request()->file("file");
            $year = date('Y');
            $m = date('m');
            $dir = $public_folderPath . $year;
            $dir_m = $folderPath . $year.'/'.$m;
            if (is_dir($dir) === false) {
                // dd($dir);
                mkdir($dir);
            }
            if (is_dir($dir_m) === false) {
                mkdir($dir_m);
            }

            $filename_original = $file->getClientOriginalName();
            $filename_ = pathinfo($filename_original, PATHINFO_FILENAME);
            $extension_ = pathinfo($filename_original, PATHINFO_EXTENSION);

            $file_slug = Str::slug($filename_);
            $file_name = uniqid() . '-' . $file_slug . '.' . $extension_;
            $img_name = '/' . $dir_m . '/' . $file_name;
            // $gallery[] = $img_name;
            
            $file->move($dir_m, $file_name);

            /*if(in_array($extension_, ['bmp','gif','jpeg','jpg','JPG','png','PNG','svg'])){
                $image = $img_name;
            }*/
        }
        
        $slug = Str::slug($data['name']);

        $dataUpload = [
            'name'  => $data['name'],
            'slug'  => $slug,
            'user_id'  => $user->id??0,
            'image'  => $image??'',
            'content'  => $data['content'],
            'file'  => $img_name??'',
        ];
        $document_uploaded = (new Document)->create($dataUpload);
        // dd($document_uploaded);

        try {
            $checkContent = ShopEmailTemplate::where('group', 'order_to_user')->where('status', 1)->first();
            $checkContent_admin = ShopEmailTemplate::where('group', 'order_to_admin')->where('status', 1)->first();
            if($checkContent || $checkContent_admin)
            {
                $email_admin       = setting_option('email_admin');
                $company_name      = setting_option('company_name');
                
                $content = htmlspecialchars_decode($checkContent->text);
                $content_admin = htmlspecialchars_decode($checkContent_admin->text);

                $dataFind = [
                    '/\{\{\$domain\}\}/',
                    '/\{\{\$name\}\}/',
                ];
                $dataReplace = [
                    '<a href="'. url('/') .'">'. url('/') .'</a>',
                    '<a href="'. route('document.detail', $document_uploaded->slug) .'">'. $document_uploaded->name .'</a>',
                ];
                $content = preg_replace($dataFind, $dataReplace, $content);
                $content_admin = preg_replace($dataFind, $dataReplace, $content_admin);
                // dd($content);
                $dataView = [
                    'content' => $content,
                ];
                $config = [
                    'to' => $user->email,
                    'subject' => 'Đăng tài liệu thành công',
                ];

                $dataView_sys = [
                    'content' => $content_admin,
                ];
                $config_sys = [
                    'to' => $email_admin,
                    'subject' => 'Tài liệu mới vừa đăng thành công',
                ];

                $send_mail = new SendMail( 'email.content', $dataView, $config );
                $sendEmailJob = new Job_SendMail($send_mail);
                dispatch($sendEmailJob)->delay(now()->addSeconds(5));

                $send_mail_admin = new SendMail( 'email.content', $dataView_sys, $config_sys );
                $sendEmailJob_admin = new Job_SendMail($send_mail_admin);
                dispatch($sendEmailJob_admin)->delay(now()->addSeconds(3));
            }
            return redirect(url('dang-tai-lieu-thanh-cong'));

        } catch(Exception $e) {
            return $e->getMessage();
        }

        
    }

    public function download()
    {
        $data = request()->all();
        $user = request()->user();

        $document = Document::find($data['id']??0);
        if($document->promotion > 0)
            $price = $document->promotion ;
        else
            $price = $document->price ;

        if($user->wallet >= $price)
        {
            $wallet = $user->wallet - $price;
            \App\User::where('id', $user->id)->update([
                'wallet'    => $wallet
            ]);
            \App\Model\DocumentDownload::create([
                'document_id' => $data['id'],
                'user_id' => $user->id,
                'price' => $price
            ]);
            return response()->json([
                'error' => false,
                'file' => asset($document->file),
                'message'   => 'Thanh toán tải file thành công'
            ]);
        }
        else
        {
            return response()->json([
                'error' => true,
                'message'   => 'Số tiền trong tài khoản của bạn không đủ để thực hiện yêu cầu này'
            ]);
        }
    }
}
