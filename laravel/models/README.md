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

You can then create a new Model instance by doing the following.

```php
$modelName = ModelName::create($request);
```
---

## Guarded



