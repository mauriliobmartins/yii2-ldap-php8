<?php

namespace mauriliobmartins\ldap\services;

use yii\base\BaseObject;
use mauriliobmartins\ldap\forms\LoginForm;
use mauriliobmartins\ldap\wrappers\LdapWrapper;


/**
 * Base settings for Auth in LDAP
 *
 * @package mauriliobmartins\ldap\services
 * @author Kosoukhov V.E.
 */
class LdapAuth extends BaseObject
{

    /**
     * @var string
     */
    public $baseDN = '';

    /**
     * @var string
     */
    public $userDN = '';

    /**
     * @var string
     */
    public $groupDN = '';

    /**
     * @var LdapWrapper
     */
    public $ldap;

    /**
     * @inheritdoc
     */
    public function authenticate(LoginForm $LoginForm)
    {
        return $this->ldap->checkAuth($LoginForm);
    }
}
