#Subscribers
Laravel 5

Installation
* Clone
* Run composer update
* Copy .env.example to .env
* Edit .env, database.php set  database, username, password.
* Run php artistan migrate
* Run php artisan db:seed


|        | GET|HEAD  | /                                 |                     | FIELDS                                                      
|        | GET|HEAD  | api/fields                        | fields.index        | 
|        | POST      | api/fields                        | fields.store        | 
|        | GET|HEAD  | api/fields/create                 | fields.create       | 
|        | DELETE    | api/fields/{field}                | fields.destroy      | 
|        | GET|HEAD  | api/fields/{field}                | fields.show         | 
|        | PUT|PATCH | api/fields/{field}                | fields.update       | 
|        | GET|HEAD  | api/fields/{field}/edit           | fields.edit         |
SUBSCRIBERS
|        | POST      | api/subscribers                   | subscribers.store   | 
|        | GET|HEAD  | api/subscribers                   | subscribers.index   | 
|        | GET|HEAD  | api/subscribers/create            | subscribers.create  | 
|        | GET|HEAD  | api/subscribers/{subscriber}      | subscribers.show    | 
|        | PUT|PATCH | api/subscribers/{subscriber}      | subscribers.update  | 
|        | DELETE    | api/subscribers/{subscriber}      | subscribers.destroy | 
|        | GET|HEAD  | api/subscribers/{subscriber}/edit | subscribers.edit    | 


