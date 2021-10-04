# イメージの指定
FROM php:8.0-fpm
# 「-s」でレスポンス時間等を表示せず、結果のみ表示してくれる。
# 「ln -s /usr/bin/composer.phar /usr/bin/composer」シンボリックリンクの作成
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
# Debian系のディストリビューション（DebianやUbuntu）のパッケージ管理システムであるAPT（Advanced Package Tool）ライブラリを利用してパッケージを操作・管理するコマンドです。
# aptライブラリを最新版に更新する
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim
# 「libpq-dev」PerlでDBIからPostgreSQLサーバーへ接続するためのDBD::Pgをインストールするために必要
# 「docker-php-ext-install」コマンド：コンテナイメージに事前に圧縮されて入っている拡張機能を解凍・インストールするコマンド
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql
WORKDIR /var/www/html