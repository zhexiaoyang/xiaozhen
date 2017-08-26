<?php
return [

    'options' => [
        'hostname' => env('SOLR_HOSTNAME', 'localhost'),
        'wt' => env('SOLR_WT', 'json'),
        'port' => env('SOLR_PORT', '80080'),
    ],
    'article_path' => '/solr/blog',
];