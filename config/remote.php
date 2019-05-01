<?php

return [

    
 'default' => 'production',
    'connections' => [
        'production' => [
            'host'      => 'pc5.instageni.umkc.edu',
			'port' 		=> '22',
            'username'  => 'apfd6',
            'password'  => '', // no password
            'key'       => 'C:\xampp\htdocs\cyneuro\ssh\id_geni_ssh_rsa_ashish',
            'keytext'   => 'myKey@90',
            'keyphrase' => 'myKey@90',
            'agent'     => '',
            'timeout'   => 300,
        ],
    ],
    'groups' => [
        'web' => ['production'],
    ],
    

];
