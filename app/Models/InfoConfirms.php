<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoConfirms extends Model
{
    protected $table = 'info_confirms';

	protected $fillable =[
		'id_shipment','status','list_image'
    ];

    public function shipment()
    {
        return $this->hasOne(Shipments::class,'id','id_shipment');
    }
}
