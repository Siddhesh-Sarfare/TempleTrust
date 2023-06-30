<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVibhagYojanaContentPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vibhag_yojana_content_pdfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vibhag_yojan_content_id');
            $table->text('file_name')->nullable();
            $table->text('file_path')->nullable();
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
        Schema::dropIfExists('vibhag_yojana_content_pdfs');
    }
}
