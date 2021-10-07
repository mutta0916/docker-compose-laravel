# Docker開発環境作成
「-h」は後ろにホスト名を書く合図。
「-u」はユーザー名。
「-p」はパスワード設定している場合に使用。
```
mysql -h localhost -u user -p
```
## 参照サイト様
[docker-composeでLaravelの開発環境を整える方法とその解説](https://www.membersedge.co.jp/blog/laravel-development-environment-with-docker-compose/)

# default.confの記述について

一致したパスであればコンテキストを実行。前方一致か正規表現。
```
location / {
    [locationコンテキスト]
}
```

URIの前にプレフィックスをつけられる。

```
location ~ \.php$ {
    [locationコンテキスト]
}
```


ファイルやディレクトリの存在チェックを行い、あればそれを返す。  
存在しない場合はリダイレクトするURIを指定する。

リクエストのあったURIのファイルがあればそれを返す。
なければ、index.php に内部リダイレクトする。
「$is_args$args」はgetパラメータの取得。
```
try_files $uri $uri/ /index.php$is_args$args;
```

正規表現（大文字小文字を区別する）
拡張子が「.php」であること。
```
location ~ \.php$ {}
```

「$fastcgi_script_name」と「$fastcgi_path_info」の値を取得する。
(.+\.php)の部分が「$fastcgi_script_name」、(/.+)の部分が「$fastcgi_path_info」
```
fastcgi_split_path_info ^(.+\.php)(/.+)$;
```

- CGI（Common Gateway Interface）
WEBサーバー上でプログラムを動かすための仕組み。

- FastCGI
CGIの改良版。
役割はCGIと同じ。
一度起動したプログラムを一定期間メモリ上に展開しておくことで
動きを速くしたり、サーバー負荷を軽減できるようになった。

## 参照サイト様
[nginx連載5回目: nginxの設定、その3 - locationディレクティブ](https://heartbeats.jp/hbblog/2012/04/nginx05.html)

[FastCGI (ファストCGI)](https://wa3.i-3-i.info/word12806.html)

# apiの実装にあたって
## データ登録fillメソッドでのエラーについて
```
Add [id] to fillable property to allow mass assignment on [App\Models\Memo].
```
[laravelでfillでセーブしようとしたらエラーが出たとき](https://qiita.com/yoshinyan/items/c2c7b0cb50c62ca02401)