# Setup
``` 
<VirtualHost *:80>
    ServerName villagestate.test
    ServerAlias villagestate.test
    DocumentRoot PATH

    <Directory PATH>
        Options -Indexes +FollowSymLinks
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/example.com-error.log
    CustomLog ${APACHE_LOG_DIR}/example.com-access.log combined
</VirtualHost>

```