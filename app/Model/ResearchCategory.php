<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResearchCategory extends Model
{
    public $timestamps = false;
    protected $table = 'research_category';
    protected $guarded =[];

    public function post()
    {
        return $this->belongsToMany('App\Model\Research', 'research_category_join', 'category_id', 'research_id');
    }
}
