<?php

require dirname(dirname(__FILE__))."/vendor/autoload.php";

use hydra\text\TextTokenizer;
use hydra\text\StreamTokenizer;
use hydra\text\reader\CsvReader;
use hydra\text\reader\LineReader;

ini_set("memory_limit", "1M");

// $memory_limit = ini_get('memory_limit');
// echo $memory_limit;
// exit;

/*
$tok = new TextTokenizer();

$tok->setText("This is a test");
$tok->setSeparators(array("st"));


var_dump($tok->nextToken());
var_dump($tok->nextToken());
var_dump($tok->nextToken());
var_dump($tok->nextToken());
*/

$loop = React\EventLoop\Factory::create();

$file = dirname(__FILE__)."/old_faithful.csv";
//$file = dirname(__FILE__)."/complicated.csv";

// $file = dirname(__FILE__)."/lines.txt";
// $csv = new CsvReader($file);
/*
$csv = new CsvReader($file, $loop);

$csv->on("row", function ($row) {
    var_dump(json_encode($row));
    var_dump("---");
});

// $csv->run();
*/

// $txt = new LineReader($file, $loop);
$txt = new CsvReader($file, $loop);

$txt->on("token", function ($token) {
    var_dump(json_encode($token));
});

$loop->run();

/*
$tok = $txt->nextToken();
var_dump($tok);

$tok = $txt->nextToken();
var_dump($tok);

$tok = $txt->nextToken();
var_dump($tok);

$tok = $txt->nextToken();
var_dump($tok);
*/

/*
$csv->on("column", function ($column) {
    //var_dump("column", $column);
    //exit;
});

$csv->on("row", function ($row){
    echo json_encode($row) . "\n";
});
*/

/*
$csv->on("token", function ($token) use (&$csv) {
    var_dump($token);
    //var_dump($csv->getText());
    
});

$csv->on("line", function ($token) {
    // var_dump($token);
});

$loop->run();

/*
$tok = new StreamTokenizer(dirname(__FILE__)."/tokens.txt", array (" ", "\n", "\r", "\r\n"), $loop);

$tok->on("token", function ($token) {
    echo "{$token["token"]} ";
});

$loop->run();
*/