# master-clinic-manager with Laravel

## Features
### Clinic Owner
* create, edit, show and delete clinics
* create, edit, show and delete nurses
* browsing doctors and check their resumes
* send offer to doctor
* hire doctor in a clinic
* show some statistics for each clinic
* customize  symptoms, diagnosis, disease and treatment tags for his clinic
* send notifications and mails to doctors and nurses
* and more..

### Doctor
* browsing offers
* accept offer and setup his timetable includes (days of weak, hours per day, number of patient for each day)
* browsing today's patients reservations
* processing a patient session
* check patient history report
* write symptoms, diagnosis, disease and treatment during the patient session
* and more..

### Nurse
* manage patients reservations (create, edit, show and delete)
* check doctors timetable

### Patient
* not have and account yet, but he can receives his history report form clinic owner or doctor

### Translation
App came with two languages (English and Arabic)

# Development
* [Laravel](https://laravel.com/docs/5.2) - PHP Framework
* [MySQL](https://www.mysql.com) - Relational Database - PhpMyAdmin
* [Laravel-pdf](https://github.com/vsmoraes/pdf-laravel5.git) - Laravel Packege

### Prerequisites
* [Visual Studio Code](https://code.visualstudio.com/)
* [Composer](https://getcomposer.org/)
* [WAMP](https://www.wampserver.com/en/) or [XAMPP](https://www.apachefriends.org/index.html)

### Installation
* Open CMD in the root folder and perform 'composer install' and 'composer update' commands
* Create a SQL database in your localhost and change db config in .nev file
* Perform 'php artisan serve'

# Android Assistant
* App have an android assistant that help doctor to write symptoms, diagnosis, disease and treatment with handwriting and manage patient's sessions easily, check it out [Clinic Helper](https://github.com/karim-alaa/master-clinic-helper)