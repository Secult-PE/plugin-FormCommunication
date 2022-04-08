<?php

namespace FormCommunication;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin
{
    protected static $instance = null;

    function __construct(array $config = [])
    {
        $config += [
            'sendEmailTo' => ''
        ];

        parent::__construct($config);
        self::$instance= $this;
    }

    function _init()
    {
        $app = App::i();
        $plugin = $this;
        $app->view->enqueueStyle("app","form-communication","css/form-communication.css");
        $app->hook('template(site.index.main-footer):end', function () use ($plugin, $app) {
            /** @var Theme $this */
            $url = $app->createUrl("formcommunication","communication");
            $this->part("form-communication-button-footer",['url'=>$url]);
        });
    }

    function register()
    {
        $app=App::i();
        $app->registerController("formcommunication","FormCommunication\\Controller");
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}