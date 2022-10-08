<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid();
            $table->string("first_name");
            $table->string('last_name');
            $table->string('country');
            $table->string('gender')->nullable()->comment("Avaialble Options: Male, Female, Other");
            $table->string("passport_number")->comment("customer passport number");
            $table->string('departure_date')->nullable();
            $table->string("ticket_type")->default("one-way")->comment("available options: one-way; returning");
            $table->string('status')->default("booked")->comment("available options: bookied, used,unused.");
            $table->string("ticket_by");
            $table->string("ticket_updated_by")->nullable();
            $table->string("ticket_station")->nullable();
            $table->string("ship")->nullable();
            $table->string('serial_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
