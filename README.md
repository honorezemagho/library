# Bug Tracking System
Bug Tracking System to help the customers point out bugs of the system so that the development team should address the issues as soon as possible.

## Requirements

-  php > 7.3
- Mysql >=5.7

- Composer
- Node > 12.15

## **Setup**

- Clone your repository
- go inside the repository folder
- open terminal and run ```composer install```
- On the terminal run ```npm install```
- On the terminal ```cp .env.example .env```
- On project folder open `.env` file and edit database configuration **`(DB_DATABASE=databaseName DB_USERNAME=dbusername DB_PASSWORD=dbpassword)`**
- On the terminal run `php artisan key:generate`
- Migrate the db by running `php artisan migrate`

If you have any issue please check out lqrqvel documentation [here](laravel.com/docs/8.x) or contact us at **`honorezemagho@gmail.com`** or **`honorezemagho`** on telegram.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Run on Google cloud run

[![Run on Google Cloud](https://storage.googleapis.com/cloudrun/button.svg)](https://console.cloud.google.com/cloudshell/editor?shellonly=true&cloudshell_image=gcr.io/cloudrun/button&cloudshell_git_repo=https://github.com/honorezemagho/library.git)
