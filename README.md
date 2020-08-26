## MyTasks

This project really isn't maintained, so if you do actually want to use it, it is mainly just useful for learning. Feel free to mess around with it as much as you want!

MyTasks is a simple task and project management app. Need to just know what you got going next in your day to day? This is the app for you.

- Add tasks and projects.
- Edit tasks, and mark as complete when done.
- Add unlimited projects and add tasks to projects to organize your tasks.

## Get started

In order to start using the app, you will need to do a few things.
1. Create a LEMP stack on DigitalOcean, or any other hosting provider.
2. Make sure to set up your server for laravel. Here is a good tutorial:https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-lemp-on-ubuntu-18-04
3. Once your server is set up, add all of the project files into the root directory of your website server.
4. Edit the example.env name to .env, and edit the configuration to fit your database and app name.
5. Run composer install.
6. You probably should install updated js dependancies.  npm install (you will need to have npm and node installed.)
7. Then compile js and css files with npm run production. 
8. Run php artisan migrate, then visit your application at your configured website domain!

## What technologies?

- Laravel 6
- php 7.2
- Bootstrap 4
- VueJs 2
