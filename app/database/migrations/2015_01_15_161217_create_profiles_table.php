<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table)
                       {
                       $table->increments('id'); 
                       $table->string('nama')->length(100); 
                       $table->enum('jeniskelamin', array('L', 'P')); 
                       $table->string('alamat')->nullable(); 
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
		Schema::drop('profiles');
	}

}
