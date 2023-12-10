FROM httpd:2.4

# Copia el archivo de configuración personalizado
COPY ./httpd.conf /usr/local/apache2/conf/httpd.conf
# RUN echo "LoadModule rewrite_module modules/mod_rewrite.so" >> /usr/local/apache2/conf/httpd.conf

# Exponer el puerto 80 para que pueda ser accesible desde fuera del contenedor
EXPOSE 9000
