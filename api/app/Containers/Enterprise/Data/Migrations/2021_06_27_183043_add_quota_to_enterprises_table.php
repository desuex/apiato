<?php

use App\Ship\App\Enterprise\EnterpriseTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddQuotaToEnterprisesTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {

        DB::statement('ALTER TABLE ' . EnterpriseTable::TABLE . ' ADD COLUMN ' . EnterpriseTable::QUOTA . ' integer default null');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('ALTER TABLE ' . EnterpriseTable::TABLE . ' DROP COLUMN ' . EnterpriseTable::QUOTA );
    }
}
