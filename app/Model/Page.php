<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;
    protected $table = 'page';
    protected $guarded =[];
}
