# PHP Style Guide
- [Code Editor](#code-editor)
- [Standards](#standards)
	- [Naming](#naming)
	- [Organization](#organization)
	- [Methods](#methods)
	- [Declarations](#declarations)
	- [Conditionals](#conditionals)
	- [Loops](#loops)

# Code Editor

# Standards
## Commenting
Add spaces between single line comment operator and text
```php
    // Bad

    //this is comment

    // Good

    // This is a good single line comment
```

Block comments/documentation
```php
    // Good

    /**
     * Description of what the next method or script does
     * the description requires a bit more descritive text
     * notice how we split it up into separate lines
     *
     * @author ryandoss (github or bitbucket username)
     * @param  boolean   $myBool
     * @return ClassName $classObject
     */

    // Bad

    /*
    This is what my method does, it does this and that, I will put this all in one long annoying line of text here.

    ryandoss added this
    */
```

## Naming
Avoid abbreviations. Come up with a descriptive name.
```php

    // Bad

    $tmpName = 'John';

    // Good

    $temporaryName = 'John';


```

Avoid object types in names.

```php

    // Bad

    $userArray = ['name' => 'john', 'name' => 'jane'];

    $customerOrdersCollection = // collection of orders;

    // Good

    $users = ['name' => 'john', 'name' => 'jane'];

    $customerOrders = // collection of orders


```

Name variables, methods, and classes based on what they are/do.

Treat acronyms as words in names (XmlHttpRequest not XMLHTTPRequest), even if the acronym is the entire name (class Html not class HTML).

## Organization
Order methods so that caller methods are earlier in the file than the methods they call.
Order methods so that methods are as close as possible to other methods they call.
```php

    class ExampleClass
    {
        // Caller method

        public function doSomething()
        {
            $users = Users::get();

            foreach ($users as $user) {

                if ($this->isUserActive($user)) {

                    // do something

                }

            }

        }

        // Method being called

        private function isUserActive($user)
        {

            // check if user is active

        }
    
        private function someAction()
        {

            // perform some action.
            
        }
    }

```


## Methods
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

## Declarations

Use single quotes for everything.

```php
// Bad
$var = "Value";

// Good
$var = 'Value';
```

## Arrays

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

In addition you should always set array in **one** declaration instead of two when possible.

```php
// Bad
$names['Han'] = 'Solo';
$names['Luke'] = 'Skywalker';
$names['Obi'] = 'Wan';

// Good
$names = [
    'Han' => 'Solo',
    'Luke' => 'Skywalker',
    'Obi' => 'Wan'
];
```

## Objects
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

## Loops
