<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentDevs extends Model
{
    protected $table = 'shipment_devs';

	protected $fillable =[
		'code_shipment_child','id_shipment','number','note','quantity'
    ];

    public function shipment()
    {
        return $this->hasOne(Shipments::class,'id','id_shipment');
    }
}
