<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('alamat');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nik');
            $table->string('tanggal_bergabung');
            $table->string('tanggal_lulus_probation');
            $table->integer('department')->references('departments_id')->on('departments_list');
            $table->string('jabatan');
            $table->integer('role')->references('roles_id')->on('roles_list');
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
        Schema::dropIfExists('users_information');
    }
}
