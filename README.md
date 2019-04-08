# ACF Unique ID Field

An [Advanced Custom Fields](https://www.advancedcustomfields.com/) field which generates a unique ID value.

While this library is intended to be used in ACF repeaters where each field in a repeater block needs to be given a persistent unique ID, it can be used anywhere an automatically-generated unique ID is required.

## Installation

```
composer require philipnewcomer/acf-unique-id-field
```

## Usage
call the ACF_Unique_ID_Field_Intializer static method init() to activate it.

`PhilipNewcomer\ACF_Unique_ID_Field\ACF_Unique_ID_Field_Intializer::init();`
or
```
use PhilipNewcomer\ACF_Unique_ID_Field_Intializer

class MyClass{
    public function __construct(){
        ACF_Unique_ID_Field_Intializer::init();
    }
}

```

Select the "Unique ID" field type when using the ACF GUI. When editing a post, unique IDs will be generated on the initial save.

## Notes

IDs will be generated in the following format:
```
59885be6f2289
```
