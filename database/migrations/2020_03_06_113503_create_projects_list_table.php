<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_list', function (Blueprint $table) {
            $table->bigIncrements('projects_id');
            $table->string('projects_name');
            $table->string('perusahaan');
            $table->enum('status_projects', ['Potensial', 'Quotation Letter', 'BRD', 'PO', 'Development', 'Testing', 'Live', 'Pembayaran', 'Maintenance', 'Finished', 'Passed']);
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
        Schema::dropIfExists('projects_list');
    }
}
