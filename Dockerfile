########################
#####  HTTP IMAGE  #####
########################
ARG PHP_TAG=8.4-fpm
FROM 335250003246.dkr.ecr.sa-east-1.amazonaws.com/php-base:${PHP_TAG} AS base

# ############################
# ##### PRODUCTION INIT  #####
# ############################
# FROM node:14-alpine3.13 as node

# RUN apk add --no-cache autoconf \
# 	automake \
# 	build-base \
# 	nasm \
# 	libtool \
# 	zlib-dev \
# 	python2 \
# 	&& rm -rf /var/cache/apk/*

# # faz da pasta 'app' o diretório atual de trabalho
# WORKDIR /application

# # copia os arquivos 'package.json' e 'package-lock.json' (se disponível)
# COPY package*.json ./

# # instala dependências do projeto
# RUN npm install

# # copia arquivos e pastas para o diretório atual de trabalho (pasta 'app')
# COPY resources ./resources
# COPY webpack.mix.js ./

# # compila a aplicação de produção com minificação
# RUN npm run production

########################
#####  HTTP IMAGE  #####
########################
FROM base AS production
ARG RELEASE_VERSION
ARG RELEASE_NUMBER

ENV RELEASE_VERSION=$RELEASE_VERSION
ENV RELEASE_NUMBER=$RELEASE_NUMBER

ARG APP_ENV=production
ENV APP_ENV=$APP_ENV

COPY .docker/entrypoint-*.sh /
COPY .docker/supervisord-*.conf /etc/supervisor/
CMD /entrypoint-http.sh

WORKDIR /application

RUN chown www-data:www-data /application -R

USER www-data

COPY --chown=www-data:www-data composer.* .
RUN composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --no-autoloader

COPY --chown=www-data:www-data  . .

# COPY ./resources/certs/* ./storage/

# UPDATE COMPOSER ON SUBMODULE AND ROOT
RUN composer dumpautoload
  # && php artisan config:cache \
  # PARA OTIMIZAR PROJETO, NECESSÁRIO REMOVAR ROTAS DAS CLOSURES
  # && php artisan route:cache \
  # && php artisan l5-swagger:generate
  #&& php artisan passport:keys



USER root
