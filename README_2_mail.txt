## 前提  
・dockerコマンド及びdocker-composeコマンドが実行可能であること。  

## 手順 
1. 以下のコマンドをローカル環境で実行する。
　※別コンテナにてmailserverを立てる

`$ docker run -d -p 25:25 --name mailserver -e maildomain=work-shops_mail -e smtp_user=admin:admin1234 catatnight/postfix

　※ユーザ:admin
　※パス:pass1234


　※work-shops本体のコンテナ上のappサーバでメールのポート（25）解放が必要なはずですが手順がわからず。
　※やりたいことはこうじゃないかもしれませんが。
　※参考サイト　https://qiita.com/South_/items/a4041f6e393de6ff556b
　

2. DockerDesktopよmeilserverのCLIに入りインストール可能なパッケージの「一覧」を更新する。

`# sudo apt-get update

3. POPサーバ(Dovecot)のインストール。

 # sudo apt install dovecot-common dovecot-imapd dovecot-pop3d
