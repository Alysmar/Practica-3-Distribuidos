<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\MySqlBuilder;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('document_type', 10);
            $table->string('document_number', 30);
            $table->string('email', 200)->unique();
            $table->string('password', 255);
            $table->string('phone', 30);
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
    
    }
};
