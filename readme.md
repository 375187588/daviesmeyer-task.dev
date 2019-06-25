# daviesmeyer-task

* This mini project is a response to the task.

* For the task, Laravel (PHP) was used on beckend, a bootstrap library was used as a frontend framework. The application has a front end available to all site visitors, and a backend available only to administrators. Frontend consists of one page on the contact form and Google Maps.

Contact form is protected by Captcha anti-spam mechanism.

* The form has validation and after successful validation, the data from the contact form is stored in the database, the message is sent to the mail service, and the message about the successful sending of the query is displayed.

* The Backend part of the system has an overview of all the messages received so far, along with a preview of the individual message and the message deletion function.

# Information to nstall

* Clone repo

* From your console at your root folder execute 'composer install' to install dependencies.

* At your project root, rename '.env.example' file to '.env' and set:

    * DB_DATABASE=daviesmeyer
    * DB_USERNAME=root
    * DB_PASSWORD=root
    * NOCAPTCHA_SECRET=6LdR_xIUAAAAAB0YI4bUvujvoLF69awaF7WbcUqy
    * NOCAPTCHA_SITEKEY=6LdR_xIUAAAAANTuNZlHiNVUJ2hjTnvsnvf14Se1
    * GOOGLE_API_KEY=AIzaSyCknIeCExEnnD78mH7dj2Ccczb3270mppE
    
* To send mails trough the app you should set mail options at your .env file. If you use gmail it should looks like this:

   * MAIL_DRIVER=smtp
   * MAIL_HOST=smtp.gmail.com
   * MAIL_PORT=465
   * MAIL_USERNAME=username@gmail.com
   * MAIL_PASSWORD=password
   * MAIL_ENCRYPTION=ssl

* From your console at your root folder execute 'php artisan key:generate' to generate and set APP_KEY

* From your console at your root folder execute 'sh checkall.sh' to start migrations and seeders

* To enter front of the app daviesmeyer-task.dev

* To enter backend of the app daviesmeyer-task.dev/login

    * user: admin@admin.com

    * pass: admin
