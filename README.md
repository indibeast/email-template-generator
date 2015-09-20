# Email template generator using blade.
[![Build Status](https://travis-ci.org/indibeast/email-template-generator.svg?branch=master)](https://travis-ci.org/indibeast/email-template-generator)
[![Coverage Status](https://coveralls.io/repos/indibeast/email-template-generator/badge.svg?branch=master&service=github)](https://coveralls.io/github/indibeast/email-template-generator?branch=master)

## Minimum Requirements ##

- PHP 5.5+

Installation
------------

Install using composer:

```bash
composer require indibeast/email-template-generator
```

## Example FileWriter
```php
 $filewriter = new Writer(__DIR__ . '/../files/');//Set the directory
 $content = 'Hi {{$name}}';//Blade content
 $filewriter->setFilename('sample')->setContent($content)->save();//This will create sample.blade.php file in the given location.
 ```
## Example FileReader
 ```php
 $reader = new Reader(__DIR__ . '/../files/');//Set the directory where blade files located.
 $reader->setFilename('sample')->readeFile();//This will display 'Hi {{$name}}'.
 ```
## Example BladeRender
 ```php
 $reader = new BladeRender(__DIR__ . '/../files',__DIR__ . '/../cache');//Set views nad cache folder for blade files.
 $reader->render('sample',['name' => 'Mahendra']);//This will display 'Hi Mahendra'.
 ```
## License

The MIT License (MIT). Please see [License File](https://github.com/indibeast/email-template-generator/blob/master/LICENSE) for more information.

