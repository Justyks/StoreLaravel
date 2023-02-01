<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_good', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('good_id');
            $table->unsignedBigInteger('quantity');
        });

        Schema::table('basket_good',function(Blueprint $table){
            $table->foreign('basket_id')
            ->references('id')
            ->on('baskets')
            ->cascadeOnDelete();

            $table->foreign('good_id')
                ->references('id')
                ->on('goods')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_good');
    }
};
