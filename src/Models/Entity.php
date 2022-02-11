<?php

namespace BonsaiCms\Metamodel\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BonsaiCms\Metamodel\Database\Factories\EntityFactory;

class Entity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'table',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string
    {
        return Config::get('bonsaicms-metamodel.entityTableName');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return EntityFactory::new();
    }

    /*
     * Relationships
     */

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class)
            ->orderBy('id');
    }

    public function leftRelationships(): HasMany
    {
        return $this->hasMany(Relationship::class, 'left_entity_id')
            ->orderBy('id');
    }

    public function rightRelationships(): HasMany
    {
        return $this->hasMany(Relationship::class, 'right_entity_id')
            ->orderBy('id');
    }

    /*
     * Getters
     */

    public function getRealTableNameAttribute(): string
    {
        return
            Config::get('bonsaicms-metamodel.generatedTablePrefix').
            $this->getAttribute('table').
            Config::get('bonsaicms-metamodel.generatedTableSuffix');
    }

    public function getOriginalRealTableNameAttribute(): string
    {
        return
            Config::get('bonsaicms-metamodel.generatedTablePrefix').
            $this->getOriginal('table').
            Config::get('bonsaicms-metamodel.generatedTableSuffix');
    }
}
