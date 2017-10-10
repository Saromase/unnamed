<?php

//Override of the default config from LaravelIdeHelper
$data = require_once (__DIR__."/../vendor/barryvdh/laravel-ide-helper/config/ide-helper.php");
$data['include_fluent'] = true;
$data['model_locations'] = [
    "app",
    "app/Models"
];

return $data;
