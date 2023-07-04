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
        Schema::table('store_members', function (Blueprint $table) {
            $table->foreign(['store_id'], 'store_foreign')->references(['id'])->on('stores');
            $table->foreign(['member_id'], 'member_foreign')->references(['id'])->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_members', function (Blueprint $table) {
            $table->dropForeign('store_foreign');
            $table->dropForeign('member_foreign');
        });
    }
};
