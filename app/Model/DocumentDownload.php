<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DocumentDownload extends Model
{
    public $timestamps = true;
    protected $table = 'document_download';
    protected $guarded = [];

}
