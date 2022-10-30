<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    public $timestamps = true;
    protected $table = 'research_post';
    protected $guarded = [];

    public function category_post()
    {
        return $this->belongsToMany('App\Model\ResearchCategory', 'research_category_join', 'research_id', 'category_id');
    }

    public function getDetail($id, $type='')
    {
        $detail = new Research;
        if($type == 'slug')
            $detail = $detail->where('slug', $id);
        else
            $detail = $detail->where('id', $id);

        $detail = $detail->first();
        return $detail;
    }
}
