<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Investor;
use Illuminate\Support\Facades\Hash;
use App\Libraries\Helpers;
use Illuminate\Support\Str;
use DB, File, Image, Config;
use Illuminate\Pagination\Paginator;

class InvestorController extends Controller
{
    public $data = [];
    public $admin_path = 'admin.investor';
    public $title_head;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->title_head = __('Tác giả');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $db = new Investor;

        if(request()->has('search_title') && request()->search_title != ''){
            $search_title = request('search_title');
            $db->where('name', 'like', '%'. $search_title .'%');
        }

        $posts = $db->orderByDesc('id')->paginate(20);

        $dataReponse = [
            'posts'  => $posts,
            'title_head'  => $this->title_head,
            'url_create'  => route('admin_investor.create'),
        ];

        return view($this->admin_path .'.index', $dataReponse);
    }

    public function create(){
        $dataReponse = [
            'title_head'  => $this->title_head . ' | Thêm mới',
            'url_action'  => route('admin_investor.post'),
        ];
        return view($this->admin_path .'.single', $dataReponse);
    }

    public function edit($id){

        $post = Investor::find($id);
        if($post){
            $dataReponse = [
                'post'  => $post,
                'title_head'  => $this->title_head,
                'url_action'  => route('admin_investor.post'),
            ];

            return view($this->admin_path .'.single', $dataReponse);
        } else{
            return view('404');
        }
    }

    public function post(Request $rq){

        $data = request()->all();
        $post_id = $data['id'];

        $title_new = $data['name'];
        $title_slug = addslashes($data['slug']);

        if(empty($title_slug) || $title_slug == ''):
           $title_slug = Str::slug($title_new);
        endif;
        //xử lý description
        $description= htmlspecialchars($data['description']);
        $description_en = htmlspecialchars($data['description_en']);

        //xử lý content
        $content = htmlspecialchars($data['content']);
        $content_en = htmlspecialchars($data['content_en']);

        $galleries = $data['gallery'] ?? '';
        if($galleries!=''){
            $galleries = array_filter($galleries);
            $data['gallery'] = $galleries ? serialize($galleries) : '';

        }

        $save = $data['submit'] ?? 'apply';
        
        $data_db = array(
            'name' => $title_new,
            'slug' => $title_slug,
            'description' => $description,
            'content' => $content,
            'name_en' => $data['name_en'],
            'description_en' => $description_en,
            'content_en' => $content_en,

            'author' => $data['author']??'',

            'gallery' => $data['gallery'] ?? '',
            'image' => $data['image'] ?? '',
            'cover' => $data['cover'] ?? '',
            'icon' => $data['icon'] ?? '',
            'status' => $data['status'] ?? 0,
            'sort' => $data['sort'] ?? 0,

            'seo_title' => $data['seo_title'] ?? '',
            'seo_keyword' => $data['seo_keyword'] ?? '',
            'seo_description' => $data['seo_description'] ?? '',
        );

        if($post_id == 0){
            $respons = Investor::create($data_db);
            $post_id= $respons->id;
        } else{
            $respons = Investor::find($post_id)->update($data_db);
        }

        if($save=='apply'){
            $msg = "Investor has been Updated";
            $url = route('admin_investor.edit', array($post_id));
            Helpers::msg_move_page($msg, $url);
        }
        else{
            return redirect(route('admin_investor'));
        }
    }
}
