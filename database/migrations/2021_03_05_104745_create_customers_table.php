<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel_num', 20);
            $table->string('model');
            $table->string('todo');
            $table->text('comment');
            $table->timestamp('added_at', $precision = 0)->useCurrent();
            $table->timestamp('finished_at', $precision = 0)->nullable()->default(NULL);
            $table->float('price', 4, 2)->default(0);
            $table->float('cost', 4, 2)->default(0); //islaidos
            $table->boolean('paid')->default(false);
            $table->boolean('ready')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}