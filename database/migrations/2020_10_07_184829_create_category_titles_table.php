<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryTitles', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('category_id');
            $table->string('categoryClient');
            $table->string('prjectDate');
            $table->string('prjectUrl');
            $table->string('prjectTitle');
            $table->longText('prjectDetail');
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
        Schema::dropIfExists('categoryTitles');
    }
}
