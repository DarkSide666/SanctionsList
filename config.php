<?php

// database connection
$config['dsn'] = 'pgsql://user:pass@localhost:5432/sanctions';

// is debug mode enabled ?
$config['debug'] = true;

// resource configuration
$config['resources'] = [
    'ano' => [
        'url' => 'http://sankcijas.kd.gov.lv/files/consolidated.xml',
        //'url' => 'http://localhost/sanctions_list/docs/consolidated.xml',
        'parser' => \sanctions\list\Resource\ANO::class,
    ],
    'ofac' => [
        'url' => 'http://sankcijas.kd.gov.lv/files/sdn.xml',
        //'url' => 'http://localhost/sanctions_list/docs/sdn.xml',
        'parser' => \sanctions\list\Resource\OFAC::class,
    ],
    'es_old' => [
        'url' => 'http://sankcijas.kd.gov.lv/files/global.xml',
        //'url' => 'http://localhost/sanctions_list/docs/global.xml',
        'parser' => \sanctions\list\Resource\ES_OLD::class,
    ],
    'es' => [
        'url' => 'http://sankcijas.kd.gov.lv/files/xmlFullSanctionsList_1_1.xml',
        //'url' => 'http://localhost/sanctions_list/docs/xmlFullSanctionsList_1_1.xml',
        'parser' => \sanctions\list\Resource\ES::class,
    ],
    'lv' => [
        'url' => 'http://sankcijas.kd.gov.lv/files/LV_national.xml',
        //'url' => 'http://localhost/sanctions_list/docs/LV_national.xml',
        'parser' => \sanctions\list\Resource\LV::class,
    ],
];

// include local config if it exists
if (file_exists(dirname(__FILE__).'/config-local.php')) {
    include(dirname(__FILE__).'/config-local.php');
}
