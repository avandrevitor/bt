# bt
[![Build Status](https://travis-ci.org/avandrevitor/bt.svg?branch=master)](https://travis-ci.org/avandrevitor/bt)
[![Code Climate](https://codeclimate.com/github/avandrevitor/bt/badges/gpa.svg)](https://codeclimate.com/github/avandrevitor/bt)
[![Test Coverage](https://codeclimate.com/github/avandrevitor/bt/badges/coverage.svg)](https://codeclimate.com/github/avandrevitor/bt/coverage)

Benchmarking Tools

### Utils

##### phploc
````
php vendor/bin/phploc src --log-xml=build/logs/phploc.xml
````
##### phpcs
````
php vendor/bin/phpcs --standard=PSR2 --bootstrap=vendor/autoload.php --report=xml --report-file=build/logs/checkstyle.xml src/
````
##### phpmd
````
php vendor/bin/phpmd src/ html cleancode, codesize, controversial, design, naming, unusedcode > build/logs/phpmd.html
````
##### phpcpd
````
php vendor/bin/phpcpd --log-pmd=build/logs/phpmd-phpcpd.xml --progress src/
````
##### pdepend
````
php vendor/bin/pdepend --jdepend-xml=build/logs/jdepend.xml --jdepend-chart=build/logs/pdepend.svg --overview-pyramid=build/logs/overview-pdepend.svg --coderank-mode=method src/
````
##### phpunit
````
php vendor/bin/phpunit 
````
##### phpdox
````
php vendor/bin/phpdox
````

