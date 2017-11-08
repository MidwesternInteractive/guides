# Standards
- [Methods](#methods)
- [Declarations](#declarations)
- [Conditionals](#conditionals)
- [Loops](#loops)

---

## Methods
Order methods so that caller methods are earlier in the file than the methods they call, and so methods are as close as possible to other methods they call.

```php
// Bad
function called($hello)
{
    return $hello . 'World!';
}

function caller()
{
    return $this->called('Hello');
}

// Good
function caller()
{
    return $this->called('Hello');
}

function called($hello)
{
    return $hello . 'World!';
}
```

Place first and closing parenthesis for a function on their own lines.

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

Use an empty line between methods.

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

Don't include spaces next to the start or closing parenthesis, or brackets.

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

Break up method calls more than 2 methods deep, keep each method call on its own line. Place the -> at the beginning of the line.

```php
// Bad
$object->methodOne()->methodTwo()->methodThree()->lastMethod();

// Good
$object->methodOne()
    ->methodTwo()
    ->methodThree()
    ->lastMethod();
```

---

## Declarations
Use single quotes for everything.

```php
// Bad
$var = "Value";

// Good
$var = 'Value';
```

Declare variables with snake case.

```php
// Bad
$canYouReadThis = 'Not very easy.';

// Good
$you_can_read_this = 'Much better.';
```

Avoid abbreviations. 

```php
// Bad
$f_name = 'first name';

// Good
$last_name = 'last name';
```

Avoid object types in names and try to come up with a more expressive name.

```php
// Bad
$user_array = [ 'email@email.com', 'email2@email.com'];

// Good
$user_emails = [ 'email@email.com', 'email2@email.com'];

```

Name variables, methods, and classes based on what they are/do.

```php
// Bad
function times()
{
    return 'What times, and how?'
}

// Good
function getAvailableAppointmentTimes()
{
    return '';
}
 
```

Classes must be camel case.

```php
// Bad
class camelCase
{
    public function classMethod()
    {
        return 'Bad';
    }
}

// Good
class CamelCase
{
    public function classMethod()
    {
        return 'Good';
    }
}
```

Method names must be lower camel case.

```php
// Bad
function ThisIsNotCamelCase($hello)
{
    return $hello . 'World!';
}

function neither_is_this()
{
    return $this->called('Hello');
}

// Good
function thisIsACamelCaseExample()
{
    return $this->called('Hello');
}
```

Treat acronyms as words in names.

```php
// Bad
function XMLHTTPRequest()
{
    return 'Bad';
}

// Good
function xmlHttpRequest()
{
    return 'Good';
}
```

---

## Arrays
Use brackets for arrays.

```php
// Bad
$emails = array('email@one.com', 'email@two.com');

// Good
$emails = ['One', 'Two'];
```

If you have more than 2 elements in an array please break it up. 2 is company 3 is a crowd. Keep the elements, and closing brace on their own lines.

```php
// Bad - More than three elements on a line
$names = ['Han Solo', 'Luke Skywalker', 'Obi Wan'];

// Bad - Closing brace should have its own line.
$names = [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'];

// Good - 2 elements on the same line is fine
$names = ['Han Solo', 'Luke Skywalker'];

// Good - Elements are broken up to their own lines as well as closing brace
$names = [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'
];
```

---

## Objects
Use array to create empty object

```php
// Bad
$new_object = new \stdClass;
$new_object->value_1 = 'Defined Value 1';
$new_object->value_2 = 'Defined Value 2';

// Bad
$new_object = new class{};
$new_object->value_1 = 'Defined Value 1';
$new_object->value_2 = 'Defined Value 2';

// Good
$new_object = (object) [
    'value_1' => 'Defined Value 1',
    'value_2' => 'Defined Value 2',
];
    
```

If you have more than 2 elements in an object please break it up. 2 is company 3 is a crowd. Keep the elements, and closing brace on their own lines.

```php
// Bad - More than three elements on a line
$names = (object) ['Han Solo', 'Luke Skywalker', 'Obi Wan'];

// Bad - Closing brace should have its own line.
$names = (object) [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'];

// Good - 2 elements on the same line is fine
$names = (object) ['Han Solo', 'Luke Skywalker'];

// Good - Elements are broken up to their own lines as well as closing brace
$names = (object) [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan'
];
```

---

## Conditionals
Use spaces around operators

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

---

## Loops
