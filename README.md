# simple-recipe-store

"simple-recipe-store"はレシピを文章で登録するのではなく「具材」、「調理器具」、「調理方法」、「時間」の要素で構成されたある種のBlockの組み合わせで登録するサイトです。

# DEMO

初めに任意の「具材」、「調理器具」、「調理方法」、「時間」をヘッダーのリンクから登録してください。
そのあとそれらを組み合わせてレシピを登録してください。

![image](https://github.com/hita-fttk/express_tutorial/assets/78365187/16a1bb05-c85b-4fb5-b1b6-d4ae0b49ef7e)

# Requirement

* PHP 8.0
* docker-compose
# Installation
1 初めに git clone 本リポジトリをローカルに持ってくる。  
2 docker-compose up -> docker-compose ps でコンテナが起動しているかとコンテナ名（app）確認後、  
3 docker exec -it app bashでコンテナ内にアクセス  
4 コンテナ内でcd simple-recipe-store でsimple-recipe-storeディレクトリに移動  
5 composer install ※結構時間がかかります。。。  
6 .env.exampleファイルをもとに.envファイルを作成　※gitignoreで.envファイルを除いてます。  
7 php artisan key:generateで.envファイルのAPP＿KEYの値を設定  
8 npm run build でviteを有効化させる。  
9　dashboard画面右上の[register]でユーザー登録  
10 完了  

# Note

スマホの画面幅に対応できておりません。ブラウザのみ使用可能になっております。
SSL対応するとフォントが崩れてしまったのでhttp://での使用推奨になります。

# Author

* hita-fttk
* higaki-tahanori
