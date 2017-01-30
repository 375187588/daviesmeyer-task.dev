# Install

* Clone repo

* From your console 'composer install' to install dependencies.

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

* From your console 'php artisan key:generate' to generate and set APP_KEY

* From your console 'sh checkall.sh' to start migrations and seeders

* To enter front of the app daviesmeyer-task.dev

* To enter backend of the app daviesmeyer-task.dev/login

    * user: admin@admin.com

    * pass: admin
