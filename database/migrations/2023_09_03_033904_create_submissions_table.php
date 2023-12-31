<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->longText('category');
            $table->longText('file')->nullable();
            $table->longText('authorName');
            $table->longText('approvalLetter');
            $table->longText('gSLink')->nullable();
            $table->longText('numCit')->nullable();
            $table->longText('year')->nullable();
            $table->longText('faculty')->nullable();
            $table->longText('marks')->nullable();
            $table->longText('reviewer')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}
