<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    protected $table = 'medicines';

	protected $fillable =[
		'code','name','science_name','feature_image','part_used','description','purpose_use','pharmaceutical_substance'
    ];

    public function shipment()
    {
        return $this->belongsTo(Medicines::class);
    }
}
