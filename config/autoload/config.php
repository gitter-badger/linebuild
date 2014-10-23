<?php
return array(
    'db' => array(
        'username' => 'user_project',
        'password' => 'user_project',
    ),
    'transport' => array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'connection_class' => 'login',
        'connection_config' => array(
            'ssl' => 'ssl',
            'username' => 'icqparty@gmail.com',
            'password' => 'askgopa999',
        ),
    ),
    'version_control' => array(
        'bitbucked' => array(
            'client_id' => 'MQJL2SDMfaSCB4kXXP',
            'client_secret' => '9syX8KRZjZV5Vj3eqLde39KLQ3nEs9K5',
        ),
        'github' => array(
            'client_id' => '260cdd24da8bd2bf377a',
            'client_secret' => '0f243f660a059467ebc2f2212e454257dfb01699',
        ),
        'gitlab' => array(
            'client_id' => 'client_id',
            'client_secret' => 'client_secret',
        ),
        'googlecode' => array(
            'client_id' => 'client_id',
            'client_secret' => 'client_secret',
        ),
    ),
);
