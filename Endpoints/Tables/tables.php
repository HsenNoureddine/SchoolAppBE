<?php

include "../../Autoloader/autoloader.php";

$a = new Assignments();
$a->getColumnNames();
$c = new Calendar();
$c->getColumnNames();
$cl = new Classes();
$cl->getColumnNames();
$d = new Documents();
$d->getColumnNames();
$e = new Exams();
$e->getColumnNames();
$g = new Grades();
$g->getColumnNames();
$n = new News();
$n->getColumnNames();
$nt = new Notifications();
$nt->getColumnNames();
$s = new Subjects();
$s->getColumnNames();
$t = new Teachers();
$t->getColumnNames();
$uc = new UserClasses();
$uc->getColumnNames();
$u = new Users();
$u->getColumnNames();



?>