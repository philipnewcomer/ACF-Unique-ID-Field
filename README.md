# ACF Unique ID Field

An [Advanced Custom Fields](https://www.advancedcustomfields.com/) field which generates a unique ID value.

While this library was originally developer for use in repeaters where each field in a repeater block needs to be given a persistent unique ID, it can be used anywhere an automatically-generated unique ID is required.

## Installation

```
composer require philipnewcomer/acf-unique-id-field
```

## Usage

Call the `ACF_Field_Unique_ID` static method `init()` to activate it.

```php
PhilipNewcomer\ACF_Unique_ID_Field\ACF_Field_Unique_ID::init();
```

Select the "Unique ID" field type when using the ACF GUI.

When editing a post, unique IDs will be generated on the initial save.

## Notes

IDs will be generated in the following format:

```
59885be6f2289
```
