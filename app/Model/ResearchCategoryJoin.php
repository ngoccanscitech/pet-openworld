<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResearchCategoryJoin extends Model
{
    public $timestamps = false;
    protected $table = 'research_category_join';
    public $incrementing = false;
    protected $guarded =[];
}
