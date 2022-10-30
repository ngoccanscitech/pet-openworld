<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ResearchCategory;
use Illuminate\Support\Facades\Hash;
use App\Libraries\Helpers;
use Illuminate\Support\Str;
use DB, File, Image, Config;
use Illuminate\Pagination\Paginator;

class ResearchCategoryController extends Controller
{
    public $data = [];
    public $admin_path = 'admin.research-category';
    public $title_head;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->title_head = __('Danh mục nghiên cứu');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $db = new ResearchCategory;

        if(request()->has('search_title') && request()->search_title != ''){
            $search_title = request('search_title');
            $db->where('name', 'like', '%'. $search_title .'%');
        }

        $categories = $db->orderByDesc('id')->paginate(20);

        $dataReponse = [
            'categories'  => $categories,
            'title_head'  => $this->title_head,
            'url_create'  => route('admin_research.category_create'),
        ];

        return view($this->admin_path .'.index', $dataReponse);
    }

    public function create(){
        $dataReponse = [
            'title_head'  => $this->title_head . ' | Thêm mới',
            'url_action'  => route('admin_research.category_post'),
        ];
        return view($this->admin_path .'.single', $dataReponse);
    }

    public function edit($id){

        $post = ResearchCategory::find($id);
        if($post){
            $dataReponse = [
                'post'  => $post,
                'title_head'  => $this->title_head,
                'url_action'  => route('admin_research.category_post'),
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
        $description= htmlspecialchars($data['description']??'');

        //xử lý content
        $content = htmlspecialchars($data['content']??'');

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

            'category_id' => $data['category_id']??0,

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
            $respons = ResearchCategory::create($data_db);
            $post_id= $respons->id;
        } else{
            $respons = ResearchCategory::find($post_id)->update($data_db);
        }

        if($save=='apply'){
            $msg = "Research has been Updated";
            $url = route('admin_research.category_edit', array($post_id));
            Helpers::msg_move_page($msg, $url);
        }
        else{
            return redirect(route('admin_research.category'));
        }
    }
}
