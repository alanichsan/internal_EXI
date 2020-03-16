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
            $table->enum('gender',['Male', 'Female']);
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nik');
            $table->string('tanggal_bergabung');
            $table->string('tanggal_lulus_probation');
            $table->enum('department', ['IT','Marketing', 'Operational', 'Finance']);
            $table->string('jabatan');
            $table->enum('role', ['Staff', 'Manager', 'Director']);
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
        Schema::dropIfExists('users_information');
    }
}
