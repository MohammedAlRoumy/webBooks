<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->bigInteger('book_id')->unsigned();

            $table->foreign('book_id')->references('id')->on('books')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->text('comment')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}
