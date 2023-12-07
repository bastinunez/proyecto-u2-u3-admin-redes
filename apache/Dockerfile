FROM httpd:2.4

# Copia el archivo de configuración personalizado
COPY ./httpd.conf /usr/local/apache2/conf/httpd.conf

# No es necesario copiar manualmente los archivos del frontend

# Exponer el puerto 80 para que pueda ser accesible desde fuera del contenedor
EXPOSE 8080