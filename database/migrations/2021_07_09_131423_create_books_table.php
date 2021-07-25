<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration {

	public function up()
	{
		Schema::create('books', function(Blueprint $table) {
			$table->bigIncrements('id', true);
			$table->bigInteger('category_id')->unsigned();

			$table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->bigInteger('author_id')->unsigned();

            $table->foreign('author_id')->references('id')->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->string('image')->nullable();
			$table->string('name')->nullable();
			$table->longText('description')->nullable();
			$table->enum('status', ['active', 'inactive'])->nullable();
			$table->integer('rate_count')->nullable();
			$table->float('rate_average')->nullable();
			$table->integer('download_count')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('books');
	}
}
