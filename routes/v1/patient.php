<?php

use Api\Controllers;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function(RouteCollectorProxy $group) {

    $group->get('/patients',
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

});