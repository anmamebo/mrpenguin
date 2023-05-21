<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $columns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns($table);

            foreach ($columns as $column) {
                if ($column->getName() === 'id' && $column->getAutoincrement()) {
                    $sequenceName = $table . '_' . $column->getName() . '_seq';
                    DB::statement('SELECT setval(\'' . $sequenceName . '\', (SELECT MAX(id) FROM ' . $table . '))');
                    break;
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
