app_mbs 

app mbs is a system for sharing music at the home and family level, this system works on a home server on  Container Docker

app_mbs 2.0

@nati-m2 nati-m2 released this 10 minutes ago

app_mbs

cd [path] /app_mbs
For example:
cd /srv/dev-disk-by...... /app_mbs
docker-compose up -d

run ..
chown -R 33 /var/www/html/
cp /var/www/html/config/php.ini /usr/local/etc/php/php.ini

enter in the browser server ip port 1234
For example: http://192.168.0.100:1234
enjoy :)
