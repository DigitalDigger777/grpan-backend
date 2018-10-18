<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ChangeTypeContnetLegalPagesTable
 */
class ChangeTypeContnetLegalPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE legal_pages MODIFY content  LONGTEXT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE legal_pages MODIFY content  VARCHAR(255);');
    }
}
