## installing the package
SDK for working with bot-t.ru
### From CLI
```$xslt
$ composer require purt09/bottru-sdk-php:dev-master
```
## Unit testing

### Install in your local
```$xslt
$ composer install
```
### Run Tests
```$xslt
$ php vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/Services/UserTest.php
$ php vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/Services/OrderTest.php
```
or
```$xslt
$ "vendor/bin/phpunit" --bootstrap vendor/autoload.php tests/unit/Services/UserTest.php
$ "vendor/bin/phpunit" --bootstrap vendor/autoload.php tests/unit/Services/OrderTest.php
```
