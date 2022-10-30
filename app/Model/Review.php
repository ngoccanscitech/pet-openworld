<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = true;
    protected $table = 'reviews';
    protected $guarded = [];

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
