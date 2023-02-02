<?php

namespace App\Traits;

use App\Models\ProductAttachment;
use App\Models\ProductAttribute;
use App\Models\SiteImage;
use Illuminate\Support\Facades\DB;

trait ProductsTrait
{

    public function getProductsList($category_id = '', $sort = 'asc', $filter_cert = '', $top_filter = '', $product_id = array())
    {
        if ($filter_cert != '') {
            $condition = array(
                'p.status' => 1,
                'p.certification' => $filter_cert,
            );
        } else {
            $condition = array(
                'p.status' => 1,
            );
        }

        $query = DB::table('product as p')
            ->leftJoin('category as c', 'p.category_id', 'c.category_id')
            ->selectRaw("c.title as category_name, c.image as category_image , p.*")
            ->where($condition);

        if ($category_id != '') {
            $query = $query->where('c.category_id', $category_id);
        }

        if (count($product_id) > 0) {
            $query = $query->whereIn('product_id', $product_id);
        }

        return $query->orderBy('p.title', $sort)
            ->get();
    }

    public function getCategoryFilters($category_id)
    {
        $data = array();

        $filters = DB::table('category_filter as cf')
            ->join('filter as f', 'cf.filter_id', 'f.filter_id')
            ->where('category_id', $category_id)
            ->where('f.type', 1)
            ->groupBy('f.filter_id')
            ->select('f.filter_id', 'f.title')
            ->get();

        $i = 0;

        foreach ($filters as $item) {
            $data[$i]['filter_id'] = $item->filter_id;
            $data[$i]['title'] = $item->title;

            $data[$i]['attributes'] = DB::table('category_filter as cf')
                ->join('filter as f', 'cf.filter_id', 'f.filter_id')
                ->where([
                    'category_id' => $category_id,
                    'cf.filter_id' => $item->filter_id,
                ])
                ->select('cf.*')
                ->get();

            $i++;
        }

        return $data;
    }

    public function getCategoryTopFilters($category_id)
    {
        $data = array();

        $top_filters = DB::table('category_filter as cf')
            ->join('filter as f', 'cf.filter_id', 'f.filter_id')
            ->where('category_id', $category_id)
            ->where('f.type', 2)
            ->groupBy('f.filter_id')
            ->select('f.filter_id', 'f.title')
            ->get();

        $i = 0;

        foreach ($top_filters as $item) {
            $data[$i]['filter_id'] = $item->filter_id;
            $data[$i]['title'] = $item->title;

            $data[$i]['attributes'] = DB::table('category_filter as cf')
                ->join('filter as f', 'cf.filter_id', 'f.filter_id')
                ->where([
                    'category_id' => $category_id,
                    'cf.filter_id' => $item->filter_id,
                ])
                ->select('cf.*')
                ->get();

            $i++;
        }

        return $data;
    }

    public function getProduct($product_id)
    {
        return DB::table('product as p')
            ->leftJoin('category as c', 'p.category_id', 'c.category_id')
            ->leftJoin('manufacture as m', 'm.manufacture_id', 'p.manufacture_id')
            ->selectRaw("c.title as category, m.title as manufacturer, p.*, if(p.status=1,'Active','Deactive') as item_status, date_format(p.created_at,'%b %d, %Y') as created, date_format(p.modified_at,'%b %d, %Y') as last_modified")
            ->where('p.product_id', $product_id)
            ->orderBy('p.order_by', 'DESC')
            ->first();
    }

    public function getAttributes($product_id)
    {
        return DB::table('product_attribute as pa')
            ->join('category_filter as cf', 'pa.category_filter_id', 'cf.category_filter_id')
            ->join('filter as f', 'cf.filter_id', 'f.filter_id')
            ->where('pa.product_id', $product_id)
            ->selectRaw('f.title, cf.value')
            ->get();
    }

    public function getAttachment($type, $product_id)
    {
        $main = ProductAttachment::where('product_id', $product_id)
            ->where('type', $type)
            ->groupBy('main_title')
            ->select('main_title')
            ->get();

        foreach ($main as $item) {
            $item->attachments = ProductAttachment::where('product_id', $product_id)
                ->where('type', $type)
                ->where('main_title', $item->main_title)
                ->select('*')
                ->get();
        }

        return $main;
    }

    public function getCategory($category = null)
    {
        return DB::table('category as c1')
            ->leftJoin('category as c2', 'c1.parent_id', 'c2.category_id')
            ->selectRaw("c2.title as parent, c1.*, if(c1.status=1,'Active','Deactive') as category_status, date_format(c1.created_at,'%b %d, %Y') as created, date_format(c1.modified_at,'%b %d, %Y') as last_modified")
            ->where('c1.category_id', $category)
            ->orderBy('c1.order_by', 'DESC')
            ->get();
    }

    public function getSlideImages($product_id)
    {
        return SiteImage::where('type_id', $product_id)
            ->where('type', 'product')
            ->selectRaw('title, image')
            ->get();
    }

    public function filterProductsList($category_filter_id)
    {
        return ProductAttribute::where('category_filter_id', $category_filter_id)
            ->select('product_id')
            ->get();
    }
}
