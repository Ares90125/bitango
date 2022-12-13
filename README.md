# Test for bitango

## Auther
> Alexis

## About project

This project is used Laravel 9, MySQL, Vue2 and Vuetify.
I've focused on Requirement and timeline is uregent so I've write validation code only backend.
I hope you are understand about that.
and In this project, I've make migration file for three tables, thus users, user_countries, phone_book.
In this project, Seed is not required so I didn't make seed file.
I've made three models related in table and add Assessors and mutators in model.
and also implement after register, sent email, SMS.
About frontend, I've make some component and cusomized for register page.
and implement register page
for request, I've used axios and after receive result, for showing result, I've used dialog.

## Project running
```
1. git clone.
2. install PHP, Composer, MySQL, node.
3. cd backend 
4 composer install  
5. creat database which name is 'bitango'
6. php artisan migrate
7 cd ..
8 cd backend
9 yarn
10. yarn serve
```
as you can see in command, I've created migration and Seed file for test.

## API Endpoint

1. register api
   - POST :  localhost:8000/api/register
     - Parameters 
       - email
       - password
       - name
       - phone_number
       - country_name
    
## Conculation
Thank you for checking my test project
