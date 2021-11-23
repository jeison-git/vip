<?php

use App\Models\Employment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->enum('status', [Employment::BORRADOR, Employment::REVISION, Employment::RESPONDIDO])->default(Employment::BORRADOR);
            $table->string('names')->nullable();
            $table->string('surnames')->nullable();
            $table->string('slug')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality')->nullable();
            $table->string('identification')->nullable();
            $table->date('date')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('address')->nullable();
            
            $table->enum('bilingue',[Employment::SI, Employment::NOO])->default(Employment::NOO);
            $table->string('academic_level')->nullable();
            $table->string('profession')->nullable();
            $table->text('languages')->nullable();
            $table->text('studies')->nullable();
            $table->text('courses')->nullable();
            $table->text('skills')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('employments');
    }
}
