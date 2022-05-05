# Setup

The contents of the virtualhost file:
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

The contents of config.php file:
``` 

function connectToServer(){
	$host=HOSTNAME;
	$port=PORT;
	$user=USERNAME;
	$password=PASSWORD;
	$dbname=DATABASE;

	$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());

	return $con;
}
```