<?php

include_once("./Connection.php");
include_once("./Models/Model.php");
include_once("./Models/TableModels.php");



//init
$c = new Connection();

$c->createDB();

$m = new News();
$m->getColumnNames();

// $attrb = array("id"=>"2","name"=>"zein","telephone"=>"785883");

//
