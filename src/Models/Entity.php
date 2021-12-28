<?php

namespace BonsaiCms\Metamodel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BonsaiCms\Metamodel\Database\Factories\EntityFactory;

class Entity extends Model
{
    use HasFactory;

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string
    {
        return config('bonsaicms-metamodel.database.table.prefix').'entities'.config('bonsaicms-metamodel.database.table.suffix');
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
        return $this->hasMany(Attribute::class);
    }
}
