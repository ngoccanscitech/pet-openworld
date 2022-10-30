<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = true;
    protected $table = 'document';
    protected $guarded = [];
    protected  $sc_category = []; // array category id

    public function priceFinal()
    {
        if($this->promotion > 0 && $this->promotion > $this->price)
            return $this->promotion;
        return $this->price;
    }

    public function getDetail($id, $type='')
    {
        $detail = new Document;
        if($type == 'slug')
            $detail = $detail->where('slug', $id);
        else
            $detail = $detail->where('id', $id);

        $detail = $detail->first();
        return $detail;
    }

    public function getList(array $dataSearch)
    {
        $keyword = $dataSearch['keyword'] ?? '';

        $sort_order = $dataSearch['sort_order'] ?? '';
        $element = $dataSearch['element'] ?? '';
        $limit = $dataSearch['limit'] ?? 0;

        $list = (new Document);

        if (count($this->sc_category)) {
            $tablePTC = (new ShopProductCategory)->getTable();
            $list = $list->leftJoin($tablePTC, $tablePTC . '.product_id', $this->getTable() . '.id');
            $list = $list->whereIn($tablePTC . '.category_id', $this->sc_category);
        }

        if($element != '')
        {
            $elements = explode(',', $element);
            $list = $list->whereHas('element', function($query) use($elements){
                    return $query->whereIn('slug', $elements);
                });
        }

        if ($keyword) {
            $list = $list->where(function ($query) use($keyword){
                $query->where('name', 'like', '%' . $keyword . '%');
            });
        }

        if ($sort_order) {
            $field = explode('__', $sort_order)[0];
            $sort_field = explode('__', $sort_order)[1];
            $list = $list->orderBy($field, $sort_field);
        } else {
            $list = $list->orderBy('id', 'desc');
        }
        if($limit)
            $list = $list->where('status', 1)->limit($limit)->get();
        else
            $list = $list->where('status', 1)->paginate(20);
        return $list;
    }
}
