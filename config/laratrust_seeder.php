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
        'superAdmin' => [
            'users' => 'r,u',
            'admins' => 'r,u',
            'categories' => 'c,r,u,d',
            'governorates' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'ads' => 'c,r,u,d',
        ],
        'admin' => [],
        'user' => [
            'profile' => 'u',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];