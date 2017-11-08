# Code Guide
The one style guide to rule them all... or something...

Language/freamwork-specific style guides

- [HTML](https://github.com/MidwesternInteractive/style/tree/master/html)
- CSS 
- [JS](https://github.com/airbnb/javascript)
- [Laravel](https://github.com/MidwesternInteractive/style/tree/master/laravel)

---

## Overview
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
