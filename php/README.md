# PHP Style Guide
- [Code Editor](#code-editor)
- [Standards](#standards)
	- [Declarations](#declarations)

# Code Editor

# Standards

## Declarations
###Don't include spaces next to the start or closing parenthesis, or brackets.

```php
// Bad
function $foo( $bar )
{
    return $bar;
}

// Good
function $foo($bar)
{
    return $bar;
}
```

###If you have more than 2 elements in an array or object please break it up. 2 is company 3 is a crowd. Keep the elements, and closing brace on their own lines.

```php
// Bad ###More than three elements on a line
$names = ['Han Solo', 'Luke Skywalker', 'Obi Wan'];

// Bad ###Closing brace should have its own line.
$names = [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'];

// Good ###2 elements on the same line is fine
$names = ['Han Solo', 'Luke Skywalker'];

// Good ###Elements are broken up to their own lines as well as closing brace
$names = [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'
];
```

###Place first and closing parenthesis for a function on their own lines.

```php
// Bad
function $foo($bar) {
    return $bar
}

// Good
function $foo($bar)
{
    return $bar;
}
```

###Use an empty line between methods.

```php
// Bad
function foo($bar)
{
    return $bar;
}
function bar($foo)
{
    return $foo;
}

// Good
function foo($bar)
{
    return $bar;
}

function bar($foo)
{
    return $foo;
}
```

###Use spaces after commas, after colons and semicolons.
###If you break up a chain of method calls, keep each method call on its own line. Place the -> at the beginning of the line.

```php
// Bad
$object->methodOne()->methodTwo()->methodThree()->lastMethod();

// Good
$object->methodOne()
    ->methodTwo()
    ->methodThree()
    ->lastMethod();
```

###Use spaces around operators

```php
// Bad
if ($test==$result) {
    return false;
}

// Good
if ($test == $result) {
    return true;
}
```

###Use single quotes for everything.

```php
// Bad
$var = "Value";

// Good
$var = 'Value';
```

## Naming
###Avoid abbreviations. 
###Avoid object types in names (user_array, email_collection, UserService, InspectionTrait). Try to come up with a more expressive name.
###Name variables, methods, and classes based on what they are/do.
###Treat acronyms as words in names (XmlHttpRequest not XMLHTTPRequest), even if the acronym is the entire name (class Html not class HTML).

## Organization
###Order methods so that caller methods are earlier in the file than the methods they call.
###Order methods so that methods are as close as possible to other methods they call.
