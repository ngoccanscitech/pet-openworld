<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Page;
use App\Model\Research;
use App\Model\ResearchCategory;

class ResearchController extends Controller
{
    use \App\Traits\LocalizeController;
    
    public $data = [];
    
    public function index()
    {
        $this->data['seo'] = [
            'seo_title' => 'Nghiên cứu',
            'seo_image' => '',
            'seo_description'   => '',
            'seo_keyword'   => '',

        ];
        $this->data['posts'] = (new Research)->paginate(20);
        return view($this->templatePath .'.research.index', $this->data);
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
            return view($this->templatePath .'.research.index', $this->data);
        }
        else
            return $this->detail($slug);
    }
    
    public function detail($slug)
    {
        $this->localized();
        $post = (new Research)->getDetail($slug, $type = 'slug');
        $this->data['post'] = $post;

        $this->data['news_featured'] = (new Research)->where('status', 1)->limit(3)->get();

        $this->data['seo'] = [
            'seo_title' => $post->seo_title!=''? $post->seo_title : $post->name,
            'seo_image' => $post->image,
            'seo_description'   => $post->seo_description ?? '',
            'seo_keyword'   => $post->seo_keyword ?? '',

        ];
        // dd($this->data['seo']);
        return view($this->templatePath .'.research.single', $this->data);
    }
}
