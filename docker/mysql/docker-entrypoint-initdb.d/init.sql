CREATE USER IF NOT EXISTS 'xyz'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
CREATE DATABASE IF NOT EXISTS xyz;
GRANT ALL PRIVILEGES ON *.* TO 'xyz'@'%'
FLUSH PRIVILEGES;