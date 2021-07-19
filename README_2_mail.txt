## 前提  
・READMEの作業が完了していること。
　※ローカルより、telnet localhost smtp
　　コマンドにて、Postfix（SMTPサーバ）にログイン可能なこと。

## 手順 
1. DockerDesktopよmeilserverのCLIに入りインストール可能なパッケージの「一覧」を更新する。

`# sudo apt-get update

3. POPサーバ(Dovecot)のインストール。

 # sudo apt install dovecot-common dovecot-imapd dovecot-pop3d
