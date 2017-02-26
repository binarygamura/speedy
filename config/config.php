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
            "module" => "Employee",
            "menu" => [
                'Tiere suchen' => 'SearchAnimal',
                'Tier erfassen' => 'AddAnimal',
                'Tierarten verwalten' => 'ManageSpecies',
                'Tierrassen verwalten' => 'ManageRaces'
                ]
            ],
        "Vorstand" => [
            "role" => 7,
            "module" => "Management",
            "menu" => [
                "Eingänge je Zeitraum" =>  "AdditionsReport",
                "Behandlungen je Zeitraum" =>  "AdditionsReport",
                "Vermittlungsübersicht je Zeitraum" =>  "AdditionsReport",
                "Pflegefälle je Zeitraum" =>  "AdditionsReport"
                ]
            ],
        "Admin" => [
            "role" => 15,
            "module" => "Admin",
            "menu" => [
                    "Mitarbeiter verwalten" => "ManageUser"
                ]
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