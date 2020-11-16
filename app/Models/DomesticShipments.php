<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomesticShipments extends Model
{
    protected $table = 'domestic_shipments';

	protected $fillable =[
		'id_shipment','origin','quantity','unit','certificate','processing_unit'
    ];

    public function shipment()
    {
        return $this->hasOne(Shipments::class,'id','id_shipment');
    }
}
