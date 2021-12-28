<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('bonsaicms-metamodel.database.table.prefix').'entities'.config('bonsaicms-metamodel.database.table.suffix'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('table')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('bonsaicms-metamodel.database.table.prefix').'entities'.config('bonsaicms-metamodel.database.table.suffix'));
    }
};
