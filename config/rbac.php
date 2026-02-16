<?php

return [
    // Configurations for application
    'role' => [
        // Default role assigned to users when they are created
        // This should match the default role in your RBAC configuration
        'default' => 'user',

        // Highest role in the hierarchy, typically for administrators
        // This should match the highest role in your RBAC configuration
        // It is used to determine the highest level of access in the system
        'highest' => 'admin',
    ],

    // List of roles and permissions
    'list' => [
        'roles' => [
            'admin',
            'committee',
            'user',
        ],
        'permissions' => [
        ],
    ],

    // Roles that can assign other roles
    'assign' => [
        'admin'     => ['admin', 'committee', 'user'],
        'committee' => ['committee', 'user'],
        'user'      => ['user'],
    ],

    // Permissions for each role
    'permissions' => [
        'admin' => [
        ],
        'committee' => [
        ],
        'user' => [
        ],
    ],
];
