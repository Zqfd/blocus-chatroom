# Blocus Chatroom

<div align='center'>
    <img src='preview.png'>
</div>
Instant messaging app with HTML/CSS JavaScript and PHP

## Features

- Sign up without phone number and without mail.
- All messages in database are encrypted with openssl (AES-256-CTR sha256)
- All messages are deleted after 24h
- Fast configuration on a running web server
- Android friendly interface
- Easy config
- Made with the less JavaScript possible 
- Even more coming soon (Contacts, persistant area, intagrated proxies, etc)


## How to use
- Go visit the official instance [chatroom.blocus.ch](https://chatroom.blocus.ch)
- Download the [android app](https://github.com/blocus-org/blocus-chatroom-android/tags) (Alpha)

## How to host

You need to setup an apache/php/mariadb webserver
- [Linux](#linux)
- [Windows](#windows) (soon)
- [Web server already setup](#config)


## <a name='linux'>Linux</a>

[Here](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mariadb-php-lamp-stack-on-debian-11) 's a complete tutorial for setting up your own php/mysql/apache webserver .<br> Made by digital ocean for Debian 11.



## <a name='config'> Config</a>

- Open the config file (php/config.php)
- Set username and password for database
- Change the encryption key with another autogenerated 256bit key (php/encrypt.php)
- Create database (blocus_chat_db)
- Put all files in your webserver root
- Import .sql file with adminer  (blocus_chat_db.sql) (http://localhost/adminer.php)
- Visit http://localhost

