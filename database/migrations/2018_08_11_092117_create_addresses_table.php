<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('pin_code', 6);
            $table->string('town', 100);
            $table->string('distinct', 100);
            $table->string('state', 100);
            $table->string('state_code', 100);
            $table->string('name', 100);
            $table->string('address', 150);
            $table->string('mobile', 100);
            $table->boolean('is_default', 100)->default(0);
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
        Schema::dropIfExists('addresses');
    }
}
