<?php

return [
    'integrations' => [
        'vozovoz' => [
            'base_url' => getenv('VZ_BASE_URL'),
            'token'  => getenv('VZ_TOKEN')
        ]
    ]
];
