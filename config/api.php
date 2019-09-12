<?php

/**
 * Premier League API
 */
return [
    'url' => 'https://fantasy.premierleague.com/api/bootstrap-static/',

    // Table mapper, this will map the field from API Provider to Players' table
    'mapper' => [
        'root' => 'elements',
        'fields' => [
            'code' => 'code',
            'first_name' => 'first_name',
            'second_name' => 'second_name',
            'total_points' => 'total_points',
            'influence' => 'influence',
            'creativity' => 'creativity',
            'threat' => 'threat',
            'ict_index' => 'ict_index'
        ]
    ]
];
