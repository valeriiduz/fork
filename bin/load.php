<?php

// Zero firewall

require_once 'FireWall/Assay.php';

// First parse request

require_once 'Parse/Parse.php';
require_once 'Route/Route.php';

// Second load all config in this framework

require_once '../config/config.php';

// Third load Model and Controller in bin folder

require_once 'Controller/SkeletonController.php';
require_once 'Model/SkeletonModel.php';
require_once 'Assay/Request.php';

// load Model, Controller, View

require_once 'Assembly/assembly.php';
