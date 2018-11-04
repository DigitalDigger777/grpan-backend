<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddStatusToLegalPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legal_pages', function (Blueprint $table) {
            $table->boolean('status');
        });

        $results = DB::table('legal_pages');

        foreach ($results as $item) {
            DB::table('legal_pages')->update([
                'status' => true
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_pages', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
