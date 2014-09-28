# CakePHP Chatwork [![Build Status](https://secure.travis-ci.org/sirone/chatwork_cakephp.png?branch=master)](http://travis-ci.org/sirone/)

CakePHP - Chatwork Plugin は Chatwork API (2014-09-28 時点のプレビュー版) による実装です。

## 必要環境 (Requirements)

master ブランチの必要環境 (The master branch has the following requirements)

* CakePHP 2.3.10 以降. (CakePHP 2.3.10 or greater.)
* PHP 5.3.0 以降. (PHP 5.3.0 or greater.)

## インストール (Installation)

* `app/Plugin/Chatwork` ディレクトリにコピーするか、git clone でファイルを格納してください。 (Clone/Copy the files in this directory into `app/Plugin/Chatwork`)

git の場合は git submodule コマンドが便利です。 (This can be done with the git submodule command)
```sh
git submodule add https://github.com/sirone/cakephp-chatwork.git app/Plugin/Chatwork
```

* `app/Config/bootstrap.php` にて、`CakePlugin::load('Chatwork');` のようにプラグインを読み込んでください。 (Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Chatwork');`)

# ドキュメント(Documentation)

## 設定(Configuration)

書きかけ (now writing... sorry)
