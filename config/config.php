<?php

define('STAGE_DEV', "dev");
define('STAGE_PROD', "prod");
define('REDBEAN_MODEL_PREFIX', '\\speedy\\model\\' );

/**
 * global configuration of the application.
 */
$config = [
    'general' => [
        'maintenance' => false,
        'stage' => STAGE_DEV,
        'title' => 'Tierhilfe'
    ],
    'templating' => [
        'templateDir' => './templates',
        'compileDir' => './templates_c'
    ],
    'logging' => [
        'logfile' => './logs/main.log'
    ],
    'routing' => [
        'login' => 'Login', 
        'home' => 'Home'
    ],
    'database' => [
        'dsn' => 'later',
        'username' => 'your_mother',
        'password' => 'too_easy'
    ],
    'menu' => [
        "Home" => [
            "role" => 1,
            "module" => "Home",
            "menu" => []
            ],
        "Mitarbeiter" => [
            "role" => 3,
            "module" => "Home",
            "title" => "Home",
            "menu" => []
            ],
        "Vorstand" => [
            "role" => 7,
            "module" => "Management",
            "menu" => []
            ],
        "Admin" => [
            "role" => 15,
            "module" => "Admin",
            "menu" => []
            ],
        "Logout" => [
            "role" => 3,
            "module" => "Logout",
            "menu" => []
            ],
        "Kontakt" => [
            "role" => 1,
            "module" => "Contact",
            "menu" => []
        ],
        "Login" => [
            "role" => 1,
            "module" => "Login",
            "menu" => []
            ]
    ]
];