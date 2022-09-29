<?php

namespace App\Traits;

use App\Models\Address;
use App\Models\Config;
use App\Models\Content;
use App\Models\ContentSection;
use Illuminate\Support\Facades\DB;

trait PageTrait
{

    public function getConfigData()
    {
        return Config::select("*")
            ->first();
    }

    public function getItem($id = null)
    {
        return Content::selectRaw("*, if(status=1,'Active','Deactive') as item_status, date_format(created_at,'%b %d, %Y') as created, date_format(modified_at,'%b %d, %Y') as last_modified")
            ->where('id', $id)
            ->first();
    }

    public function getAddressCountries()
    {
        return DB::table('country as c')
            ->join('address as a', 'c.iso_code_2','a.country')
            ->groupBy('a.country')
            ->selectRaw('c.iso_code_2 as code, c.name')
            ->get();
    }

    public function getList()
    {
        return Address::select("*")
            ->orderBy('id', 'DESC')
            ->get();
    }

    function getDefaultAddress()
    {
        return Address::select("address")
            ->where('status', 2)
            ->first();
    }

    public function getPageSections($page_id)
	{
		return ContentSection::select("*")
            ->where('content_id', $page_id)
            ->get();
	}

    public function getSectionItem($id = null)
    {
        return ContentSection::select("*")
            ->where('id', $id)
            ->first();
    }

    public function getSectionList()
    {
        return ContentSection::select("*")
            //->order_by('id', 'DESC')
            ->get();
    }
    
}
