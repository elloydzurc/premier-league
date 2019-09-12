<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('code', false);
            $table->string('first_name', 50);
            $table->string('second_name', 50);
            $table->smallInteger('total_points', false);
            $table->decimal('influence', 7, 2);
            $table->decimal('creativity', 7, 2);
            $table->decimal('threat', 7, 2);
            $table->decimal('ict_index', 7, 2);
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
        Schema::dropIfExists('players');
    }
}
