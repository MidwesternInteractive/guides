# Laravel Code Standards
- [Methods](#methods)
- [Declarations](#declarations)
- [Conditionals](#conditionals)
- [Loops](#loops)

---

## Methods
Methods should have a single responsiblity. If can't state what your method does in a single sentence, it's doing too much and you should extract some of the functionality into another method.

```php
// A dumb, made up example, but you get the point.

// Bad

public function sendOrderShippedNotification(User $user)
{
    // Send an email to admin
    Mail::to($user->email)->send(new OrderShipped($order));

    // Update user's analytics
    $totalOrders = Order::where('user_id', $order->user_id)->get();
    $analytics = Analytics::where('user_id', $order->user_id)->get();
    $analytics->total_orders = $totalOrders->count();
}

// Good

public function sendOrderShippedNotification(Order $order)
{
    // Send an email to admin
    Mail::to($user->email)->send(new OrderShipped($order));
    $this->updateOrderAnalytics($order);
}

public function updateOrderAnalytics($order)
{
    // Update user's analytics
    $totalOrders = Order::where('user_id', $order->user_id)->get();
    $analytics = Analytics::where('user_id', $order->user_id)->get();
    $analytics->total_orders = $totalOrders->count();
    $analytics->save();
}

```

    
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
function foo($bar) {
    return $bar
}

// Good
function foo($bar)
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
function foo( $bar )
{
    return $bar;
}

// Good
function foo($bar)
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

// Only exception is when apostrophes as necessary
$my_array = [
    'My String',
    "Tom's String"
];
```

Declare method parameters with lower camel case. This will allow us to easily identify which variables were declared outside the method and which are method specific.

```php
// Bad
function foo($parameter_one, $ParameterTwo) {
    //
}

// Good
function foo($parameterOne, $parameterTwo) {
    //
}
```

Declare variables inside of method with snake case.

```php
// Bad
$thisIsNotRight = 'Do not do this.';

// Good
$do_this_instead = 'Much better.';
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

Negate the comma after the last item in an array, it's an unecessary character
```php
// Bad
$names = [
    'Han Solo',
    'Luke Skywalker',
    'Obi Wan',
];

// Good
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
    'value_2' => 'Defined Value 2'
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
Keep open parenthises on the same line as conditional call

```php
//Bad
if ($test == $result)
{
    echo 'Bad.';
} else
{
    echo 'Really bad.'
}

// Good
if ($test == $result) {
    echo 'Good.';
} else {
    echo 'Really good.'
}

```

Use spaces around operators

```php
// Bad
return ($test==$result);

// Good
return ($test == $result);
```
Use Short-circuit for simple if's

```php
// Bad
isset($test) ? $test->callFunction() : null;
!isset($test) ? null : $test->callFunction();

// Good
isset($test) and $test->callFunction();
isset($test) ?: $test->callFunction();

```

Use ternary for simple if / else

```php
// Bad
if ($test == $result) {
    return 'Output Something!';
} else {
    return 'Output Something Different!';
}

// Good
return ($test == $result) ? 'Output Something!' : 'Output Something Different';

```

Use expression result for booleans

```php
// Bad
if ($test == $result) {
    return true;
} else {
    return false;
}

// Good 
return ($test == $result);

```
---

## Loops

Use foreach for array / object traversal

```php
// Bad
for ($i = 0; $i < count($users); $i++) {
    //...
}

// Good
foreach ($users as $user) {
    //...
}
```

