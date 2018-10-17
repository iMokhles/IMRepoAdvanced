<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changelogs', function (Blueprint $table) {
            $table->increments('id');

            // log's package
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('cascade');

            // moderator of change log
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            // change log text
            $table->longText('changes')->nullable();

            // package version
            $table->string('package_version')->nullable();

            // package hash
            $table->string('package_hash')->nullable();

            // package identifier
            $table->string('package_identifier')->nullable();

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
        Schema::dropIfExists('changelogs');
    }
}
