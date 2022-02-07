<?php

namespace BonsaiCms\Metamodel\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BonsaiCms\Metamodel\Database\Factories\AttributeFactory;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'column',
        'data_type',
        'default',
        'nullable',
    ];

    protected $casts = [
        'nullable' => 'boolean',
        'default' => 'json',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string
    {
        return Config::get('bonsaicms-metamodel.attributeTableName');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AttributeFactory::new();
    }

    /*
     * Relationships
     */

    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }
}
