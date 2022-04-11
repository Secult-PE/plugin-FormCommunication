<?php 
$app = MapasCulturais\App::i();

/** @var Theme $this */
$app->view->enqueueStyle("app","form-communication","css/form-communication.css");
$url=$app->createUrl("formcommunication","sendEmail");
$app->view->part("home-developer--form-communication",["url"=>$url]);

?>