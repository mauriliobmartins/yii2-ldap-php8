# Yii2 extension for LDAP - PHP 8 Compatible Fork
---
This is a **fork** of the original package created by [Vadim E. Kosoukhov](https://github.com/original-author), updated to be compatible with **PHP 8**.

## 📦 About

The original package was no longer maintained and did not support PHP 8. This fork updates the codebase to ensure full compatibility with modern PHP versions, while preserving the functionality and spirit of the original implementation.

## ✅ Modifications

The following updates were made in this fork:

- Updated syntax to support PHP 8
- Replaced deprecated functions and features
- Basic testing for PHP 8 compatibility

## ⚖ License

This project is licensed under the [MIT License](./LICENSE).

---

Authorize, search users, get user groups and other from LDAP

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![Latest Stable Version](https://poser.pugx.org/mauriliobmartins/ldap/v/stable)](https://packagist.org/packages/mauriliobmartins/ldap)
[![Total Downloads](https://poser.pugx.org/mauriliobmartins/ldap/downloads)](https://packagist.org/packages/mauriliobmartins/ldap)
[![Latest Unstable Version](https://poser.pugx.org/mauriliobmartins/ldap/v/unstable)](https://packagist.org/packages/mauriliobmartins/ldap)
[![License](https://poser.pugx.org/mauriliobmartins/ldap/license)](https://packagist.org/packages/mauriliobmartins/ldap)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mauriliobmartins/yii2-ldap-php8
```

or add

```
"mauriliobmartins/yii2-ldap-php8": "*"
```

to the require section of your `composer.json` file.

Application configuration example:
----------------------------------
In config/main.php add:  
```php
return [
    'components' => [
        'ldap' => [
            'class' => 'mauriliobmartins\ldap\Connector',
            'useCache' => YII_ENV_DEV ? false : true,
        ],
    ],
    // ...
];
```

In config/main-local.php add:  

```php
return [
    'components' => [
        'ldap' => [
            'host' => 'ldap.example.com',
            'port' => '389',
            'baseDN' => 'OU=...,DC=...,DC=...,DC=net',
            'userDN' => '@....corp.net',
            'groupDN' => '',
            //Input your AD login/pass on dev or sys login/pass on test/prod servers
            'sysUserLogin' => '',
            'sysUserPassword' => '',
        ],
    ],
    // ...
];
```

Usage example:
--------------
```php
if (!Yii::$app->ldap->validateUserCredentials('SAMAccountName', 'password')) {
    throw new ErrorException('Incorrect username or password.');
}
```

```php
echo Yii::$app->ldap->getUserAttributesBySAMAccountName('SAMAccountName', ['mail', 'sn', 'givenname', 'middlename']);
```

```php
echo mauriliobmartins\ldap\widgets\UserImage::widget([
    'login' => Yii::$app->user->identity->username,
    'options' => [
        'class' => 'img-circle',
        'alt' => 'User Image',
    ]
]);
```   
