<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_name', 32)->unique();
            $table->string('original_name');
            $table->string('extension', 4);
            $table->string('mime_type', 128);
            $table->string('url')->unique();
            $table->string('file_path')->unique();
            $table->string('storage_disk', 32);
            $table->string('hash', 32);
            $table->string('meta')->nullable();
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
        Schema::drop('documents');
    }
}
