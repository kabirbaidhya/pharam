Pharam
======
Pharam (फारम) is an extensible HTML5 Form Generator. It it a CLI tool that reads your database to generate forms that your application requires. Pharam expects to take the pain out of your development by easing common form generation tasks which is used in majority of web projects. It is framework agnostic thus can be used in any PHP or Non-PHP environments.

Pharam supports large number of databases: MySQL, Oracle, SQLite, PostgreSQL and more. You can easily extend the classes provided by Pharam to generate your own forms or can even be used to generate framework based forms.

##Third Party Packages Used

* [doctrine/dbal](https://github.com/doctrine/dbal) - For database abstraction
* [illuminate/container](https://github.com/illuminate/container) - For Inversion of Control (IOC Container)
* [symfony/console](https://github.com/symfony/console) - For CLI

##Installation

1) Download the phar archive:

    wget https://github.com/kabirbaidhya/pharam/raw/master/release/pharam.phar
    
2) Create a config file using the following command and fill in the required credentials :

    php pharam.phar init
    
3) Generate forms using the following command:

    php pharam.phar generate [<table>] [--all]

**Note**: For more information try the `--help` flag.

##About

###Requirements
Pharam requires **PHP 5.5.9** or above.

###Architecture
View the current Pharam architecture [here](https://raw.githubusercontent.com/kabirbaidhya/pharam/master/image/pharam.png).

###Submitting bugs and feature requests
Contribute to this project. Bugs and feature request are tracked on [GitHub](https://github.com/kabirbaidhya/pharam/issues).

###License
Pharam is licensed under the MIT License - see the LICENSE file for details.
