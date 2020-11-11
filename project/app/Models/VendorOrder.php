<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class VendorOrder extends Model
{
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }



    public function files($id){
      $a = "";
      return $a;
    }


    static function VendorStatus($ordn){
      $a = DB::table('vendor_orders')->where('order_number', $ordn)->first();
      if(isset($a->status)){
        return $a->status;
      }else{
        return '-- -- --';
      }
      
    }
}
