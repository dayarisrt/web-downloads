<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('banner');
            $table->string('logo');
            $table->string('footer');
            $table->string('email');
            $table->string('telefono');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twiter');
            $table->boolean('active');
            $table->integer('user_id');
            $table->integer('catalog_id');
            $table->integer('site_id');
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
        Schema::dropIfExists('sites_customers');
    }
}
