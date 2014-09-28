# CakePHP Chatwork
[![Build Status](https://travis-ci.org/sirone/chatwork_cakephp.svg?branch=master)](https://travis-ci.org/sirone/chatwork_cakephp)[![Latest Stable Version](https://poser.pugx.org/cakephp/chatwork_cakephp/v/stable.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp) [![Total Downloads](https://poser.pugx.org/cakephp/chatwork_cakephp/downloads.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp) [![Latest Unstable Version](https://poser.pugx.org/cakephp/chatwork_cakephp/v/unstable.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp) [![License](https://poser.pugx.org/cakephp/chatwork_cakephp/license.svg)](https://packagist.org/packages/cakephp/chatwork_cakephp)

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
