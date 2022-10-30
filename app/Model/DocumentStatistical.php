<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DocumentStatistical extends Model
{
    public $timestamps = false;
    protected $table = 'document_statistical';
    protected $guarded =[];

    public function statistical($document_id)
    {
        $now = Carbon::now();
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d H:i:s');
        // dd($startOfWeek);
        $audio = DocumentStatistical::firstOrCreate( ['document_id'=> $document_id]);
        if($audio)
        {
            if($audio->created == null)
            {
                $audio->update(['created_at' => $startOfWeek]);
                $audio->increment('view');
            }
            else
            {
                if($startOfWeek > $audio->created)
                {
                    $audio->update(['view' => 1, 'created' => $startOfWeek ]);
                }
                else
                    $audio->increment('view');
            }
        }
        return;
    }

    public function detail($value='')
    {
        return $this->hasOne(Audio::class);
    }

    public function getList($dataSearch = [])
    {
        $limit = $dataSearch['limit']??0;
        $list = (new DocumentStatistical);

        $list = $list->join('document', 'document.id', 'document_statistical.document_id')
            ->select('document.*');
        if($limit)
        {
            $list = $list->limit($limit);
            $list = $list->orderByDesc('document_statistical.view')->get();
        }
        else
        {
            $list = $list->orderByDesc('document_statistical.view')->paginate(20);   
        }

        return $list;

    }
}
