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
        Schema::create(Config::get('bonsaicms-metamodel.relationshipTableName'), function (Blueprint $table) {
            $table->id();

            // TODO: relationship moze byt nullable (napr. oneToOne alebo oneToMany moze byt nullable)

            $table->enum('type', [
                'oneToOne',
                'oneToMany',
                'manyToMany',
            ]);

            // NOT NULL when type is manyToMany
            $table->string('pivot_table')->nullable();

            // NOT NULL when type is manyToMany
            $table->string('left_foreign_key')->nullable();
            $table->string('right_foreign_key');

            $table->string('left_relationship_name');
            $table->string('right_relationship_name');

            $table->foreignId('left_entity_id')
                ->constrained(Config::get('bonsaicms-metamodel.entityTableName'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('right_entity_id')
                ->constrained(Config::get('bonsaicms-metamodel.entityTableName'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();

            // TODO
//            $table->unique([ 'left_entity_id', 'left_relationship_name' ]);
//            $table->unique([ 'right_relationship_name', 'right_relationship_name' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('bonsaicms-metamodel.relationshipTableName'));
    }
};
