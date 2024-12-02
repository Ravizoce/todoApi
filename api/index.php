<?php

// Change the working directory to Laravel's public directory
chdir(dirname(__DIR__) . '/public');

// Let Laravel handle the request
require 'index.php';
