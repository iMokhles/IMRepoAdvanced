<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            // author of review
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            // moderator of review
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            // reviewed package
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('cascade');

            // reviewed version
            $table->string('package_version');

            // review text
            $table->longText('comment');

            // review rate
            $table->double('rate', 15, 8)->nullable();

            // review timestamp
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
        Schema::dropIfExists('reviews');
    }
}
