<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->float('monthly_rental');
            $table->float('deposit_amount');
            $table->tinyInteger('max_tenants');
            $table->tinyInteger('minimum_duration_months');
            $table->date('available_from');
            $table->tinyInteger('council_tax_band');
            $table->char('epc_rating', 1);
            $table->string('description');
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
        Schema::dropIfExists('properties');
    }
}
