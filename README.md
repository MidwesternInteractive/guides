## MWI Style Guide
The one style guide to rule them all... or something...

Language/freamwork-specific style guides

- [Laravel](https://github.com/MidwesternInteractive/style/tree/master/laravel)
- [HTML](https://github.com/MidwesternInteractive/style/tree/master/html)
- [PHP](#)

## How Tos

## Formatting
- Avoid inline comments.

```php
	$boolean = false; // Bad Comment

	// Good Comment
	$boolean = true;
```

- Break long lines after 80 characters.

```php
	// Bad - Line exceeds 80 characters
	$query->where('column_name', 'This is a long line of code')->orWhere('column_name', '>=', '80')->get();

	// Good - Line has been broken beautifully
	$query->where('column_name', 'This is a great break of code')
		->orWhere('column_name', '>=', '80')
		->get();
```

- Delete trailing whitespace.
- Don't include spaces after (, [ or before ], ).
- Don't misspell.
- If you break up an array, keep the elements on their own lines and closing curly brace on its own line.
- Use 4 space indentation (no tabs).
- Use an empty line between methods.
- Use spaces after commas, after colons and semicolons, around { and before }.
- If you break up a chain of method calls, keep each method call on its own line. Place the -> at the beginning of the line. [Example](https://github.com/MidwesternInteractive/style/blob/master/examples/break-up-method-calls.php) 
- Use spaces around operators ($var != 'example')
- Use single quotes for 
- For arrays, separate every item with a comma (even the last one)

## Naming
- Avoid abbreviations. 
- Avoid object types in names (user_array, email_collection, UserService, InspectionTrait). Try to come up with a more expressive name.
- Name variables, methods, and classes based on what they are/do.
- Treat acronyms as words in names (XmlHttpRequest not XMLHTTPRequest), even if the acronym is the entire name (class Html not class HTML).

## Organization
- Order methods so that caller methods are earlier in the file than the methods they call.
- Order methods so that methods are as close as possible to other methods they call.
