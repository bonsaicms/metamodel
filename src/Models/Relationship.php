<?php

namespace BonsaiCms\Metamodel\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BonsaiCms\Metamodel\Database\Factories\RelationshipFactory;

class Relationship extends Model
{
    use HasFactory;

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string
    {
        return Config::get('bonsaicms-metamodel.relationshipTableName');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return RelationshipFactory::new();
    }

    /*
     * Relationships
     */

    public function leftEntity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'left_entity_id');
    }

    public function rightEntity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'right_entity_id');
    }

    /*
     * Getters
     */

    public function getRealPivotTableNameAttribute()
    {
        return
            Config::get('bonsaicms-metamodel.generatedTablePrefix').
            $this->getAttribute('pivot_table').
            Config::get('bonsaicms-metamodel.generatedTableSuffix');
    }

    public function getOriginalRealPivotTableNameAttribute()
    {
        return
            Config::get('bonsaicms-metamodel.generatedTablePrefix').
            $this->getOriginal('pivot_table').
            Config::get('bonsaicms-metamodel.generatedTableSuffix');
    }
}
