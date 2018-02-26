## Zend framework 3.0

## nginx.conf

  ```bash
server {
  listen 80;
  server_name  d.uenu.com;
  root /home/work/www/zf3/public;
  location / {
        index index.php index.html index.htm;
        try_files $uri $uri/ /index.php?$args;
  }  
  access_log  /home/work/logs/default_access.log  main;
  error_log  /home/work/logs/default_error.log  crit;
  

  location ~ \.php$ {
            #fastcgi_pass   127.0.0.1:9000;
            fastcgi_pass   unix:/dev/shm/php-cgi7.sock;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME   $document_root$fastcgi_script_name;
            include        fastcgi_params;
            client_max_body_size 10m;
        }
}
  ```


