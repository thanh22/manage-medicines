<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentAdds extends Model
{
    protected $table = 'shipment_adds';

	protected $fillable =[
		'code_shipment_add','list_code','note','quantity'
    ];
}
