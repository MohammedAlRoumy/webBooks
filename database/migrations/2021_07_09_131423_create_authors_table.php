<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration {

	public function up()
	{
		Schema::create('authors', function(Blueprint $table) {
			$table->id();
			$table->string('image')->nullable();
			$table->string('name')->nullable();
			$table->longText('bio')->nullable();
			$table->enum('status', ['active', 'inactive'])->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('authors');
	}
}
