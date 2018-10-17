<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');

            // author of package upload
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            $table->text('Package')->nullable();
            $table->text('Source')->nullable();
            $table->text('Version')->nullable();
            $table->text('Priority')->nullable();
            $table->text('Section')->nullable();
            $table->string('Architecture')->nullable()->default("iphoneos-arm");
            $table->text('Essential')->nullable();
            $table->text('Maintainer')->nullable();

            // Binary Dependencies
            $table->text('Pre-Depends')->nullable();
            $table->text('Depends')->nullable();
            $table->text('Recommends')->nullable();
            $table->text('Suggests')->nullable();
            $table->text('Conflicts')->nullable();
            $table->text('Enhances')->nullable();
            $table->text('Breaks')->nullable();

            $table->text('Filename')->nullable();
            $table->unsignedBigInteger('Size')->nullable();
            $table->unsignedBigInteger('Installed-Size')->nullable();
            $table->text('Description')->nullable();

            $table->text('Homepage')->nullable();
            $table->text('Website')->nullable();
            $table->text('Depiction')->nullable();
            $table->text('Icon')->nullable();
            $table->text('MD5sum')->nullable();
            $table->text('SHA1')->nullable();
            $table->text('SHA256')->nullable();

            $table->text('Origin')->nullable();
            $table->text('Bugs')->nullable();
            $table->text('Name')->nullable();
            $table->text('Author')->nullable();
            $table->text('Sponsor')->nullable();

            $table->string('package_hash')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
