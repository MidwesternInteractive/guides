# Laravel Models
- Table
- Fillables
- Guarded
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

The protected variable $fillable allows you to mass assign data to the database on Create / Update / Save calls to the model without having to explicitly define them.

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

The guarded variable $guarded allows you to protect certain attributes from being mass assignable on create without having to explicitly define them.

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

