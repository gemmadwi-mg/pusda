<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            // 'payments' => 'c,r,u,d',
            // 'profile' => 'r,u'
        ],
        'upt_psda_kediri' => [
            'users' => 'c,r,u,d',
            // 'profile' => 'r,u'
        ],
        'upt_psda_lumajang' => [
            'users' => 'c,r,u,d',
        ],
        'upt_psda_bondowoso' => [
            'users' => 'c,r,u,d',
        ],
        'upt_psda_pasuruan' => [
            'users' => 'c,r,u,d',
        ],
        'upt_psda_bojonegoro' => [
            'users' => 'c,r,u,d',
        ],
        'upt_psda_pamekasan' => [
            'users' => 'c,r,u,d',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
