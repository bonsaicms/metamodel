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
        Schema::create(config('metamodel.database.table.prefix').'attributes'.config('metamodel.database.table.suffix'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('column');
            $table->timestamps();

            $table->foreignId('entity_id')
                ->constrained(config('metamodel.database.table.prefix').'entities'.config('metamodel.database.table.suffix'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('metamodel.database.table.prefix').'attributes'.config('metamodel.database.table.suffix'));
    }
};
