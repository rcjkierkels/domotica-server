[![HitCount](http://hits.dwyl.io/rcjkierkels/domotica-server.svg)](http://hits.dwyl.io/rcjkierkels/domotica-server)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/dwyl/esta/issues)
[![Known Vulnerabilities](https://snyk.io/test/github/rcjkierkels/domotica-server/badge.svg?targetFile=package.json)](https://snyk.io/test/github/rcjkierkels/domotica-server?targetFile=package.json)

# About Domotica Server
The domotica server works together with [domotica clients](https://github.com/rcjkierkels/domotica-client) and the [domotica app](https://github.com/rcjkierkels/domotica-app). The domotica server has a rest API with which you can create jobs. Job consists of tasks. You tell the server which tasks the job consists of and which clients will perform these tasks. You also specify on the server which actions need to be taken when a tasks generates an event. The domotica client itself checks the server for new tasks and will execute an async worker to perform the tasks. Lets take a look at an example. Let’s say we have a job that is ‘monitoring your garage door’. Take a look at the diagram below:

![Schematic](https://roland.kierkels.net/wp-content/uploads/2019/02/domotica-diagram-2.png)

More info: https://roland.kierkels.net/2019/02/selfmade-domotica-system/

# Requirements
* PHP >= 7.2.0
* Apache2 or higher
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* JSON PHP Extension

# Installation
```
# Add the correct information to your .env file
cp .env-example .env

composer install
php artisan migrate

```

# Security
If you discover any security related issues, please email roland.kierkels@noveesoft.com instead of using the issue tracker.

# License
This application is open-source software licensed under the MIT license.