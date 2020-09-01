<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookshelvesContextNodeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookshelves', function (Blueprint $table) {
            $table->integer('context_node_id')->after('id')->unsigned()->unique()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookshelves', function (Blueprint $table) {
            $table->dropColumn('context_node_id');
        });
    }
}
