<?php

namespace App\Traits;

use App\Models\Address;
use App\Models\Config;
use App\Models\Content;
use App\Models\ContentSection;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

trait SubscribeTrait
{

    public function subscribeData($info)
    {
        Subscription::create($info);

        // $this->db->set($info);
        // echo $this->db->set($info)->get_compiled_insert($this->table); die;
        // $this->db->insert($this->table);
    }    
    
}
