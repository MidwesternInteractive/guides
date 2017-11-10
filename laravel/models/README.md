# Laravel Models
- Table
- Fillables
- Guarded
- Events
- Boot
- Local Scope
- Relationships
- Accessors
- Mutators

---

## Table

The protected variable $table allows you to bind the database table to the model.

```php
protected $table = 'table_name';
```

---

## Fillable

The protected variable $fillable allows you to white list and mass assign data to the database on create calls without having to explicitly define them.
```php
protected $fillable = [
  'column_name_one',
  'column_name_two',
  'column_name_three',
  'column_name_four',
  'column_name_five'
];
```

You can then create a new Model instance and it will accept the values from the request that are in the fillable and ignore the rest on create.

```php
$modelName = ModelName::create($request);
```

---

## Guarded

The protected variable $guarded allows you to blacklist certain attributes from being mass assignable on create without having to explicitly define them.

```php
protected $guarded = [
	'column_name_six',
	'column_name_seven',
	'column_name_eight'
];
```

You can then create a new Model instance and ignore the guarded attributes.

```php
ModelName::create($request);
```

---

## Events

The protected variable $dispatchesEvents allows you to bind classes to lifecycle events within your model.

```php
protected $dispatchesEvents = [
    'saved' => ModelSaved::class,
    'deleted' => ModelDeleted::class,
];
```

---

## Boot

The bootstrap method allows you to bootstrap any application service. Such as register Scopes, Observers, Events, and so on...

```php
public function boot()
	{
	    // Global Scope Registered
	    static::addGlobalScope(new ModelScope);

	    // Register Observer.
	    ModelName::observe(ModelObserver::class);
	}
```

---

