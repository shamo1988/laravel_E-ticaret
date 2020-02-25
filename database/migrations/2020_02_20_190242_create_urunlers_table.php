<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->string('seo');
            $table->string('resim');
            $table->string('fiyat');
            $table->longText('aciklama');
            $table->string('session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urunlers');
    }
}
