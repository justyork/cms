Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/justyork/justyork/v/stable.png)](https://packagist.org/packages/justyork/justyork)
[![Total Downloads](https://poser.pugx.org/justyork/justyork/downloads.png)](https://packagist.org/packages/justyork/justyork)
[![Build Status](https://travis-ci.org/justyork/justyork.svg?branch=master)](https://travis-ci.org/justyork/justyork)



INSTALLATION GUIDE
-------------------
* Clone the project: `git clone git@bitbucket.org:justyork/dcars.git .`
* Configure Database: `environments/[dev|prod]/common/main-local.php`
* Initialisation: `php yii init` 
* Migrate RBAC - `yii migrate --migrationPath=@mdm/admin/migrations`
* Migrate RBAC - `yii migrate --migrationPath=@yii/rbac/migrations`
* Migrate other tables: `php yii migrate` 


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
