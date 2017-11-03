## Laravel
- Use private instead of protected when defining methods on a class.
- Alphabetize the import statements. Because the SublimePHPCompanion - by default - sorts them alphabetically.
- For doc blocks use the class path for @param and use the type for @return [Example]()


## Models
- Order model contents: Constants, $guarded/$fillable/$hidden/$casts, relationships, accessors, mutators, scopes
- All boot methods need to be added to a corresponding observer, and attached the a model via the app service provider.
- Use traits in a comma separated list (e.g., use GetUser, SomeExample, TheLastExample) [Example]()

## Migrations
- Use nullable() on all non-required fields
- Name date columns with "on" suffixes.
- Name datetime columns with "at" suffixes.
- Name time columns referring to a time of day with no date with "time" suffixes.

## Controllers



