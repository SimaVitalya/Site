<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_orders', function (Blueprint $table) {
            $table->decimal('price_in_cent', 11, 2)->default(0)->change();
            $table->decimal('totalprice', 11, 2)->default(0)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_orders', function (Blueprint $table) {
            $table->integer('price_in_cent')->default(0)->change();
            $table->integer('totalprice')->default(0)->change();
        });
    }
}
