# To-Do-List
To do list

1. download the app from the below mwntioned link  https://github.com/manojvelyalan/To-Do-List.git

2. Before running the app you have to create the data base and run the migation file "php artisan migrate"

3.cretae the .env file for database credential..

APP_NAME=TO-DO-LISTS
APP_ENV=local
APP_KEY=base64:mCCmA0mgtQDuqIW1GD0Zd8ca+nPR8Y0MvE9usyQEGUc=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=to-do-list
DB_USERNAME=*********
DB_PASSWORD=*******

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


this is the sample for .env file.

4. Then run the php artisan serve command from the terminal or command window

5. enter the url, then you are able to view the application



