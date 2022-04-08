<?php 
$app = MapasCulturais\App::i();

/** @var Theme $this */

$url=$app->createUrl("formcommunication","sendEmail");
$app->view->part("home-developer--form-communication",["url"=>$url]);

?>