<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Bring back the save buttons!',
    'description' => 'Reverts the drop down save buttons in the backend to 3 single buttons',
    'category' => 'plugin',
    'author' => 'Sven Friese',
    'author_email' => 'sven@widerheim.de',
    'state' => 'stable',
    'uploadfolder' => true,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.0',
    'constraints' =>
        array(
            'depends' =>
                array(
                    'typo3' => '8.7.0-8.7.99',
                ),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
    'clearcacheonload' => false,
    'author_company' => null,
);
