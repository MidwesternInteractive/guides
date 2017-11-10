<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Trait
use App\Traits\ModelName;

// Soft Deleting
use Illuminate\Database\Eloquent\SoftDeletes;

// Events.
use App\Events\ModelSaved;
use App\Events\ModelDeleted;

// Global Scopes
use App\Scopes\ModelScope;

// Lifecycle events are observed.
use App\Observers\ModelObserver;

class ModelName extends Model
{
    // If Soft Deleting / Trait
    use SoftDeletes;
    use ModelName;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'table_name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'column_name_one',
        'column_name_two',
        'column_name_three',
        'column_name_four',
        'column_name_five'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'column_name_six',
        'column_name_seven',
        'column_name_eight'
    ];

     /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => ModelSaved::class,
        'deleted' => ModelDeleted::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Global Scope Registered
        static::addGlobalScope(new ModelScope);

        // Register Observer
        ModelName::observe(ModelObserver::class);
    }

    /**
     * Local Scopes should be second
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereType($query, $type)
    {
        return $query->where('column_one', '=', $type);
        // App\ModelName::whereType('needle')->get();
    }

    /**
     * Relationships should be third
     */
    public function oneToOne()
    {
        return $this->hasOne(RelatedModel::class, 'foreign_key');
    }

    // One To One Inverse on Related Model
    public function oneToOneInverse()
    {
        return $this->hbelongsTo(ModelName::class, 'foreign_key');
    }

    public function oneToMany()
    {
        return $this->hasMany(RelatedModel::class, 'foreign_key');
    }

    // One To One Inverse on Related Model
    public function oneToManyInverse()
    {
        return $this->belongsTo(ModelName::class, 'foreign_key');
    }

    public function manyToMany()
    {
        return $this->belongsToMany(RelatedModel::class, 'pivot_table', 'table_key', 'foreign_key');
    }

    // One To One Inverse on Related Model
    public function manyToManyInverse()
    {
        return $this->belongsToMany(ModelName::class, 'pivot_table', 'table_key', 'foreign_key');
    }

    public function polymorphicable()
    {
        return $this->morphTo();
    }

    //Inverse of Polymorphic Relationship.
    public function polymorphics()
    {
        return $this->morphMany(ModelName::class, 'polymorphicable');
    }

    /**
     * Accessors.
     *
     * @param  string  $value
     * @return string
     */
    public function getColumnNameOneAndTwoAttribute()
    {
        return $this->column_name_one . ' ' . $this->column_name_two;
    }

    /**
     * Mutators.
     *
     * @param  string  $value
     * @return string
     */
    public function setColumnOneAndTwoAttribute($value)
    {
        $columns = explode(' ', $value);

        $this->attributes['column_name_one'] = $columns[0];
        $this->attributes['column_name_two'] = $columns[1];
    }
}
