<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFotoNullableInReportesTable extends Migration
{
    public function up()
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->string('foto')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->string('foto')->nullable(false)->change();
        });
    }
}
