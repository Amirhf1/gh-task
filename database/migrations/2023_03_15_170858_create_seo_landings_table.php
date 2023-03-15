<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seo_landings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('admin_id');
            $table->string('product');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('destination_id');
            $table->string('seo_h1');
            $table->string('seo_title');
            $table->string('seo_desc');
            $table->text('content')->nullable();
            $table->integer('status')->default(1);
//            $table->timestamps();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_landings');
    }
};
