<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        if ( Schema::hasTable('categories') ) {            
            Schema::table('posts', function (Blueprint $table) {
                $table->foreignId('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            });
        }
        
    }

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
