# How to Use
1. Checkout/download this repository to your computer and save it on your web server public folder.

2. Start your SQL server and execute the file ``database.sql`` to create the database and table used by the Push Server.

3. Open the file ``data/db_config.php`` and define the Google API KEY:
```php
define("GOOGLE_API_KEY", "...............");
```

4. Open your browser and navigate to ``http://your-server-addres/push-server/``.

5. Now you should be able to send messages: 

![Push Server form](https://raw.githubusercontent.com/MathiasBerwig/Push-server/master/screenshots/gcm-web-form.PNG)
