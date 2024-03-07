drop database if exists 21A3106;
create database 21A3106 default character set utf8 collate utf8_general_ci;
drop user if exists 'p170146'@'localhost';
create user 'p170146'@'localhost' identified by '47KJtC35';
grant all on 21A3106.* to 'p170146'@'localhost';
use 21A3106;

create table product (
    id int auto_increment primary key, 
    name varchar(200) not null, 
    explanation varchar(100) not null,
    price int not null,
    color varchar(100) not null
);

create table customer (
    id int auto_increment primary key, 
    name varchar(100) not null, 
    email_address varchar(100) unique key not null,
    address varchar(200) not null, 
    login varchar(100) not null unique, 
    password varchar(100) not null
);


/*customer_idとproduct_idはidのreferenceから作られているから具体的な数字を入れなくてもいい*/
create table purchase (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

create table purchase_detail (
	purchase_id int not null, 
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

create table favorite (
	customer_id int not null, 
	product_id int not null, 
	primary key(customer_id, product_id), 
	foreign key(customer_id) references customer(id), 	foreign key(product_id) references product(id)
);

insert into product values(null, 'エア ジョーダン 1LOW OG', '上質なホワイトのレザーと明るいユニバーシティレッドのアクセントを使用し、どこまでもすっきりとした仕上がりです。',13000,'White and University Red');
insert into product values(null, 'ウィメンズ エア ジョーダン 2 LOW', 'ユニバーシティレッドのアクセントがクリーンなホワイトレザーに映え、豪華なブラックサテンが外観の奥行きとテクスチャーのコントラストをプラスします。',10000,'Black Satin');
insert into product values(null, 'エア ジョーダン 6', 'AJ 6の人気はさらに上昇。そのシルエットは、瞬く間にポップカルチャーで特に大きな存在感を放つアイコンとなり、コート内外で当時最もホットなスニーカーとしての地位を固めた。',20000,'Blue');
insert into product values(null, 'エア マックス プラス', 'ブラックボディで重厚感たっぷりに仕立て、ワイルドな印象をプラスするダークコンコルドをミッドソールやレースロックを彩色。',17000,'Black and Purple');
insert into product values(null, 'ウィメンズ エア アジャスト フォース','セイル/ホワイト系のフルグレインレザーアッパーに、アクセントとしてシトロンからーを施している。',28000,'Black Obsidean');
insert into product values(null, 'エア マックス 2', '明るい日差しがのぞき、暖かい季節になったら、全力で行動を開始しよう。エネルギッシュなバージョンのエア マックス2は、トレンドの鮮やかなカラーブロックデザインを配したアッパーが特徴。',24000,'Black and Metalic Silver');
insert into product values(null, 'ウィメンズ コルテッツ',' 張りのあるレザーとヘリンボーンパターンのアウトソールを採用し、オリジナルモデルで人気を博したデザインラインを受け継いでいます。', 11000,'Green');
insert into product values(null, 'AAF88', 'あなたのスタイルの限界を引き上げるべくアレンジされたシルエットが、どんなコーデも引き立てる。あらゆる場所に最適なデザインが、2つの万能なカラーで登場。',14500,'White and Neutral Gray');
insert into product values(null, 'エア ジョーダン 8', ' このエディションは、AR8の特徴である成形ディテール、カラフルなデザイン、足中央部のストラップがレトロなスタイルを演出する最新復刻版です。',30000,'Black');
insert into product values(null, 'エア ジョーダン 3 × J Balvin', 'エア ジョーダン 6を履いたマイケル・ジョーダンは、シカゴ・ブルズをチーム初のファイナルへと導き、ついには初優勝をもたらした。ジョーダンとそのシグネチャーシューズは、スニーカーの世界ですでにトップの人気を誇っていた',23000,'White and Yellow');
insert into product values(null, 'ナイキ SB ダンク LOW','メデジンの夕日の色を思わせるグラデーションカラーのアクセントが、ココナッツミルクのベースとソーラーフレア―のディテールに映える。', 27000,'Pearl White');
insert into product values(null, 'NIKE SB ダンク LOW','ヒールに内蔵されたZoom Airユニットが滑らかな着地をサポートし、円形のトレッドが多方向へのグリップを発揮する。', 9000,'Orange and Green rise');
insert into product values(null, 'AJKO 1', '誰もが見たいと思うのも当然です。 クラシックなカラーブロック、テクスチャーの重なり、そして「AJKO」の翼のロゴを備えたスタイルで、勝利を約束します。',18000,'True Blue and Topaz Gold');
insert into product values(null, 'エア ジョーダン 4', 'デビュー当初はインサイドに切れ込むプレーをメインとしたが、このシーズンより3ポイントシュートの精度も飛躍的に向上。より完成された偉大なプレーヤーに向けての礎を築いた。',21000,'Red cement');





insert into customer values(null, '多田野 靖展','hhhhhhhhh@gmail.com', '新宿区道玄坂5-2-1', 'yasu', 'Eiko462000');

