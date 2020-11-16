<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportShipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_shipment');
            $table->string('origin');
            $table->string('certificate');
            $table->string('list_CO');
            $table->string('import license');
            $table->integer('number_of_licenses')->unsigned();
            $table->integer('number_of_present')->unsigned();
            $table->string('production_unit');
            $table->string('gate');
            $table->string('production_facilities');
            $table->string('facility_provided');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_shipments');
    }
}
