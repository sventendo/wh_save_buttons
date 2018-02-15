<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Bring back the save buttons!',
    'description' => 'Reverts the drop down save buttons in the backend to 3 single buttons',
    'category' => 'plugin',
    'author' => 'Sven Friese',
    'author_email' => 'sven@widerheim.de',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.2.0',
    'constraints' =>
        [
            'depends' =>
                [
                    'typo3' => '7.6.0-8.7.99',
                ],
            'conflicts' =>
                [],
            'suggests' =>
                [],
        ],
    'clearcacheonload' => false,
    'author_company' => null,
];
