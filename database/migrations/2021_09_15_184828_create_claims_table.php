<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('icon');
            $table->string('manager')->nullable();
            $table->string('document')->nullable();
            $table->string('number_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('target')->nullable();
            $table->string('url')->nullable();
                        
            $table->text('description');
            $table->string('address');
            $table->string('observation')->nullable(); 

            $table->unsignedBigInteger('commerce_id');
            $table->foreign('commerce_id')->references('id')->on('commerces')->onDelete('cascade');

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
        Schema::dropIfExists('claims');
    }
}
