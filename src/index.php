<?php

const NUMBERS = 3;

require_once '/var/www/vendor/autoload.php';

$mloader = new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views');
$m = new Mustache_Engine(['loader' => $mloader]);

$data = [];

if (array_key_exists("numberinput", $_REQUEST)) {
    $inputs = $_REQUEST["numberinput"];
    $data["inputs"] = $inputs;
    $sum = 0;
    foreach ($inputs as $thisinput) {
        $sum += $thisinput;
    }
    $data["sum"] = $sum;

}

$data["numbers"] = NUMBERS;
$data["newinputs"] = [];
for ($i=0; $i < NUMBERS; $i++) {
    $data["newinputs"][] = 1;
}

echo $m->render('index', $data);
