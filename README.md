CMS BASED ON Yii 2 Advanced
===============================
  
The template is designed to work in a team development environment. It supports
deploying the application in different environments.
 

[![Latest Stable Version](https://poser.pugx.org/justyork/cms/v/stable.png)](https://packagist.org/packages/justyork/cms)
[![Total Downloads](https://poser.pugx.org/justyork/cms/downloads.png)](https://packagist.org/packages/justyork/cms)
[![Build Status](https://travis-ci.org/justyork/cms.svg?branch=master)](https://travis-ci.org/justyork/cms)



INSTALLATION GUIDE
-------------------
* Download via composer: `composer create-project justyork/cms new-project`
* Configure Database: `environments/[dev|prod]/common/main-local.php`
* Initialisation: `php yii init`  
* Migrate tables: `php yii migrate` 
* Install some data: `php yii install` 


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
