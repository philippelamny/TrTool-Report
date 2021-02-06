  
## Authors & contact

Philippe Lam
    - philippe.lam.ny@gmail.com	
    
## Documentation and download


Latest version is available on github at :
    - https://github.com/philippelamny/TrTool-Report


## License


```
This Code is released under the GNU LGPL

Please do not change the header of the file(s).

This library is free software; you can redistribute it and/or modify it 
under the terms of the GNU Lesser General Public License as published 
by the Free Software Foundation; either version 2 of the License, or 
(at your option) any later version.

This library is distributed in the hope that it will be useful, but 
WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
or FITNESS FOR A PARTICULAR PURPOSE.

See the GNU Lesser General Public License for more details.
```


## Description


This library is a PHP Oriented Object which allows user to generate easily Reports


## Setup 

You can use composer to use this library.

```php
{
     "require": {
    
            "TrTool/Report": "dev-develop"
        },
    
    "repositories": [
      {
        "type": "vcs",
        "url": "https://github.com/philippelamny/TrTool-Report"
      }
    ]
}
```


## Example

### Test

```php
php vendor/TrTool/Report/src/ReportsTest/generateReportTest.php
```

#### One excel will be generated in current folder