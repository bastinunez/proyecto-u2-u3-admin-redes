# etapa de compilación
FROM node:18 as build-stage
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# etapa de producción
FROM httpd:2.4 as production-stage
COPY --from=build-stage /app/build /usr/local/apache2/htdocs
COPY httpd.conf /usr/local/apache2/conf
EXPOSE 80



# FROM node:14

# # instalar un simple servidor http para servir nuestro contenido estático
# RUN npm install -g http-server

# # hacer la carpeta 'app' el directorio de trabajo actual
# WORKDIR /app

# # copiar 'package.json' y 'package-lock.json' (si están disponibles)
# COPY package*.json ./

# # instalar dependencias del proyecto
# RUN npm install

# # copiar los archivos y carpetas del proyecto al directorio de trabajo actual (es decir, la carpeta 'app')
# COPY . .

# # construir aplicación para producción minificada
# RUN npm run build

# EXPOSE 8080
# CMD [ "http-server", "dist" ]