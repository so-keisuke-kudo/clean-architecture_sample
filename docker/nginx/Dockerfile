FROM nginx:alpine

ENV LC_ALL=C.UTF-8 LANG=C.UTF-8

ARG BASIC_USER_NAME
ARG BASIC_PASSWORD

# ツールをインストール
RUN apk --update --no-cache add openssl \
    && apk add vim \
    # ルートディレクトリを作成
    && mkdir -p /var/www/html && chmod 755 -R /var/www/html \
    # ソケット用ディレクトリを作成
    && mkdir -p /var/run/sock
