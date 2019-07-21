This is a webinterface including the shell Script.

You need to put all files in your var/www/html folder. 
Please put tsinterface.sh in /opt (/opt/tsinterface.sh), then you have to edit the tsinterface.sh and edit the 'filepath' to the direktory wehre your teamspeakserver stays. 

You need a database (mariaDB or somting else) and optional phpMyAdmin. Set up one or if you allready have one, create a new user: "html" and generate a password. Also create a user named root and give him no password. Make sure you only give him the right to select in your ddatabase. This is important!!! Also important is that you don't allow login without passwords. now is your root account safe from outside. Now you have to put the password from the user html in evry php file expect of logout.php. The place wehre you put in the password is in every file at the top. 
Now go to setup_db.php and set a login password at loginpassword. Please use secure passwords. Passwords are with hash encripted. Now safe every file and load the files on your server. In my path with apache2 is this: /var/www/html . 

Enter your domain or ip-adress to visit your website. You should now sea a green banner with controls and a text that says, your database does not exist. It askes you if you have all settings done in setup_db.php . If you done everything, you can press "Set up database". It will tell you if evrything worked well. If not you get an error message. 
We want that after every serverrestart, the shell script should execute itselfe. Place the "interface" file in your /etc/init.d direcory. Now you have to run this commands: 1: chmod 755 /etc/init.d/interfaces 2: update-rc.d interfaces defaults
The script might not run yet. The best way to test everything is tho restart the whole server.

Your now done with the installation. 


Please only use for private use. 
