<?php

use Illuminate\Support\Facades\Config;
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
        Schema::create(Config::get('bonsaicms-metamodel.attributeTableName'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('column');

            // TODO
            // https://laravel.com/docs/9.x/migrations#available-column-types
            // https://laravel.com/docs/9.x/eloquent-mutators#attribute-casting
            $table->enum('data_type', [
                // TODO
                'text',
                'string',
                'integer',
                'boolean',
                'date',
                'time',
                'datetime',
                'json',
            ]);
            $table->jsonb('default')->nullable();
            $table->boolean('nullable')->default(false);
            $table->timestamps();

            $table->foreignId('entity_id')
                ->constrained(Config::get('bonsaicms-metamodel.entityTableName'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unique(['entity_id', 'column']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('bonsaicms-metamodel.attributeTableName'));
    }
};
