# CakePHP Chatwork

[![Build Status](https://travis-ci.org/sirone/chatwork_cakephp.svg?branch=master)](https://travis-ci.org/sirone/chatwork_cakephp)
[![Latest Stable Version](https://poser.pugx.org/cakephp/chatwork_cakephp/v/stable.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp)
[![License](https://poser.pugx.org/cakephp/chatwork_cakephp/license.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp)

CakePHP - Chatwork Plugin は Chatwork API (2014-09-28 時点のプレビュー版) による実装です。

## 本家 (Official)

* CakePHP - http://cakephp.org/
* Chatwork - http://www.chatwork.com/
* Chatwork API - http://developer.chatwork.com/ja/index.html

## 必要環境 (Requirements)

master ブランチの必要環境 (The master branch has the following requirements)

* CakePHP 2.3.10 以降. (CakePHP 2.3.10 or greater.)
* PHP 5.3.0 以降. (PHP 5.3.0 or greater.)

## インストール (Installation)

* `app/Plugin/Chatwork` ディレクトリにコピーするか、git clone でファイルを格納してください。 (Clone/Copy the files in this directory into `app/Plugin/Chatwork`)

git の場合は git submodule コマンドが便利です。 (This can be done with the git submodule command)
```sh
git submodule add https://github.com/sirone/chatwork_cakephp.git app/Plugin/Chatwork
```

* `app/Config/bootstrap.php` にて、`CakePlugin::load('Chatwork',array('bootstrap'=>true));` のようにプラグインを読み込んでください。
(Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Chatwork',array('bootstrap'=>true));`)

# ドキュメント(Documentation)

## 設定(Configuration)

* Chatwork Plugins の設定ファイルの元は、`/app/Plugin/Chatwork/bootstrap.php.default` にあります。同一ディレクトリ上にこのファイルのコピーを作り、 bootstrap.php という名前にしてください。
(A copy of ChatworkPlugin’s bootstrap file is found in /app/Plugin/Chatwork/bootstrap.default.php. Make a copy of this file in the same directory, but name it bootstrap.php.)

設定ファイルの中身は一目瞭然です。 API_TOKEN 定数の値を自分のセットアップに合わせて変更するだけです。 例は次のようなものになるでしょう:(The config file should be pretty straightforward: just replace the values in the API_TOKEN constant with those that apply to your setup. A sample configuration constant might look something like the following:)

```php
define(__NAMESPACE__.'\API_TOKEN','X-ChatWorkToken:1s2a3m4p5l6e7h8a9h10a11');
```

この定数が `Chatwork` 名前空間に属していることに注意してください。( Please note that it belongs to the `Chatwork` namespace.. http://php.net/manual/en/language.namespaces.php)


書きかけ (now writing... sorry)
