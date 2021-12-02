<?php

use App\Models\Credentialcard;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredentialcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentialcards', function (Blueprint $table) {
            $table->id();

            $table->enum('status',[Credentialcard::ACTIVO, Credentialcard::NOACTIVO])->default(Credentialcard::NOACTIVO);

            $table->unsignedBigInteger('user_id')->unique();

            $table->unsignedBigInteger('subscription_id');

            $table->unsignedBigInteger('plan_id');

            $table->string('name');

            $table->string('cvv')->unique()->nullable();                        

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');


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
        Schema::dropIfExists('credentialcards');
    } 
}
