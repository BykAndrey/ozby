# Тестовое задание Oz.by
##### Используется php7.0 . Laravel 5.2 Framework . так же корректно работает в php5.6

## Установка
sudo apt-get install php7.0-cli php7.0-common libapache2-mod-php7.0 php7.0 php7.0-mysql php7.0-fpm php7.0-curl php7.0-mbstring phpmyadmin 
### Исходный код (Apache2 Debian):
   1. Скопировать все файлы в /var/www/site
   2. Установть права на запись если сбились (без валокиты можно  sudo chmod -R 777 site 
    и sudo chmod -R 777 site/*)
   3. Сделать копию файла /etc/apache2/site-available/(000-default.conf|default.conf)
   4. Переименовать в site.conf
   5. Добавить это:
     <br><VirtualHost *:80>
    	<br>ServerName site.local
    	<br>ServerAdmin webmaster@localhost
    	<br>DocumentRoot /var/www/site/public
    	<br>ErrorLog ${APACHE_LOG_DIR}/error.log
    	<br>CustomLog ${APACHE_LOG_DIR}/access.log combined
   <br> <Directory /var/www/site>
                  <br>  Options Indexes FollowSymLinks MultiViews
                  <br>  AllowOverride All
                  <br>  Order allow,deny
                  <br>  allow from all
                   <br> </ Directory>
                   <br>  </ VirtualHost>  <br> 
    # vim: syntax=apache ts=4 sw=4 sts=4 sr noet
   6. Выполнить sudo a2ensite site
   7. Откройте файл /etc/hosts и добавте 127.0.0.1   site.local
   8. sudo service apache2 reload
   
   #### Если не открывается site.local/phpmyadmin
   1. Открыть /etc/apache2/
   2. Добавть в конец файла Include /etc/phpmyadmin/apache.conf
### База данных:
   1. Создать БД в phpmyadmin
   2. Открыть вкладку SQL и добавть туда sql из siteoz(1).sql (в папке с иходным кодом)
   1. Нажать Go



# Подгатовка сайта
1. Откройте файл .env в папке сайта
2. Замените данные DB_DATABASE=ИМЯ_БД
                   DB_USERNAME=USER
                   DB_PASSWORD=PASS
3. Откройте файл /config/database.php 
    и заменить в массие connections->mysql 
                'database' => env('DB_DATABASE', 'ИМЯ_БД'),
                'username' => env('DB_USERNAME', 'USER'),
                'password' => env('DB_PASSWORD', 'PASS'),