<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipments';

	protected $fillable =[
		'code','id_medicine','part_use','import_price','price','note','status','created_date','origin_shipment'
    ];

    public function medicine()
    {
        return $this->hasOne(Medicines::class,'id','id_medicine');
    }

    public function domestic_shipment()
    {
        return $this->hasOne(DomesticShipments::class,'id_shipment','id');
    }

    public function import_shipment()
    {
        return $this->hasOne(ImportShipments::class,'id_shipment','id');
    }

    public function info_confirm()
    {
        return $this->hasOne(InfoConfirms::class,'id_shipment','id');
    }

    public function shipment_dev()
    {
        return $this->hasOne(ShipmentDevs::class,'id_shipment','id');
    }
}
