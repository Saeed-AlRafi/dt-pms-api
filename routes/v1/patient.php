<?php

use Api\Controllers;
use Api\Controllers\v1\patient;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/patients/{pid}',
        [
            Controllers\v1\patient::class,
            'get'
        ]
    );

    $group->post('/patients',
        [
            Controllers\v1\patient::class,
            'createpatient'
        ]
    );
    $group->post('/patients/{pid}/vitals',
        [
            Controllers\v1\patient::class,
            'addvitals'
        ]
    );

    $group->get('/patients/{pid}/info',
        [
            Controllers\v1\patient::class,
            'getpatientinfo'
        ]
    );
});