<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportShipments extends Model
{
    protected $table = 'import_shipments';

	protected $fillable =[
		'id_shipment','origin','certificate','list_CO','import_license','number_of_licenses','number_of_present','gate','production_facilities','facility_provided'
    ];

    public function shipment()
    {
        return $this->hasOne(Shipments::class,'id','id_shipment');
    }
}
