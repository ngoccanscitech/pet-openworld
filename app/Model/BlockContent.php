<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlockContent extends Model
{
    public $timestamps = false;
    protected $table = 'shop_store_block';
    protected $fillable = [
        'name',
        'text',
        'position',
        'page',
        'description',
        'sort',
        'status',
    ];
    private static $getLayout = null;

    public function getLayout()
    {
        if (self::$getLayout === null) {
            self::$getLayout = self::where('status', 1)
                ->orderBy('sort', 'asc')
                ->get()
                ->groupBy('position');
        }
        return self::$getLayout;
    }
}
