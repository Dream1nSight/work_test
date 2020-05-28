<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->timestamps();

            $table->timestamp('expiries_at')->nullable();
            $table->boolean('access');
            $table->string('link');
            $table->longText('content');
            $table->string('title')->nullable();
            $table->string('syntax')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
        });

        DB::statement('ALTER TABLE pastes ADD FULLTEXT search(`title`, `content`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
}
