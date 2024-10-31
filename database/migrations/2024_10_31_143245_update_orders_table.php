<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->after('user_id')->nullable();
            $table->string('gender')->after('name')->nullable();
            $table->text('alamat')->after('gender')->nullable();
            $table->string('nomer_whatsapp')->after('alamat')->nullable();
            $table->string('email')->after('nomer_whatsapp')->nullable();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['name', 'gender', 'alamat', 'nomer_whatsapp', 'email']);
        });
    }
}
