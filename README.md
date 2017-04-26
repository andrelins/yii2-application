INSTALATION WITH DOCKER-COMPOSE
------------------------------

This method require docker-compose.

```

https://docs.docker.com/compose/install/

```

Unpack project

```shell

$ cd yii2-application

```

Execute server

```shell

$ docker-compose up -d

```

Project is visible in:


```

http://localhost:8888/web/

```

RUN TESTS
-----------------------------

Visible in terminal

```shell

$ docker exec sprinklr_scuptel_1 cd /var/www/html & ./vendor/bin/codecept run

```

Visible in terminal and code-coverage

```shell

$ docker exec sprinklr_scuptel_1 cd /var/www/html & ./vendor/bin/codecept run --coverage-html

```

Coverage HTML in folder: 

```

'tests/_output/coverage/index.html'

```

MANUAL INSTALATION IN SERVER LINUX WITH APACHE2 
------------------------------------------------

#### PROJECT RUNNING IN **UBUNTU 14.04 with APACHE2 and PHP 5.5.9**

Unpack project in:

```

/var/www/html

```

Driver 'SQLite' for database connection.

```shell

$ sudo apt-get install php5-sqlite

```

'Composer' to libs.

```shell

$ curl -sS https://getcomposer.org/installer | php

```

```shell

$ sudo mv composer.phar /usr/local/bin/composer

```

```shell

$ composer --version

```

```shell

$ cd yii2-application

```

```shell

$ composer install

```

Folder Permissions:

```shell

$ chmod 0777 /var/www/html/sprinklr/web/assets

```

```shell

$ chmod 0777 /var/www/html/sprinklr/runtime/


```

ACCESS PROJECT
-----------------------------

```

http://localhost/yii2-application/web/

```

TEST DEPENDENCES
-----------------------------

```shell

$ sudo apt-get install php5-curl

```

```shell

$ sudo apt-get install php5-gd

```

```shell

$ sudo apt-get install php5-xdebug

```

RUN TESTS
-----------------------------

Visible in terminal 

```shell

$ ./vendor/bin/codecept run

```

Visible in terminal and code-coverage

```shell

$ ./vendor/bin/codecept run --coverage-html

```

Coverage HTML folder: 

```

'tests/_output/coverage/index.html'

```

