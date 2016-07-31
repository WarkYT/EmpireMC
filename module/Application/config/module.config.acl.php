<?php

return [
    'roles' => [
        'visiteur' => null,
        'joueur' => null,
        'administrateur' => null,
    ],
    'resources' => include 'module.config.controllers.php',
    'privileges' => [
        'visiteur' => include 'module.config.acl.visiteur.php',
        'joueur' => include 'module.config.acl.joueur.php',
        'administrateur' => include 'module.config.acl.administrateur.php',
    ],
];
