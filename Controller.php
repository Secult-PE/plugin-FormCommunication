<?php

namespace FormCommunication;

use MapasCulturais\App;
use MapasCulturais\i;
use FormCommunication\Plugin;

class Controller extends \MapasCulturais\Controller
{
    protected $plugin;
    protected $config;

    public function __construct()
    {
        $this->plugin = Plugin::getInstance();
        $this->config = $this->plugin->config; 
    }

    public function GET_communication(){
        /** @var App $app */
        $app = App::i();
        $this->render("form");
    }
    
    public function ALL_sendEmail(){
        /**  @var App $app*/
        $app = App::i();
        $request = $this->data;
        $mustache = new \Mustache_Engine();
        $site_name = $app->view->dict('site: name', false);
        $filename = $app->view->resolveFilename("views/emails", "form-communication.html");       
        $template = file_get_contents($filename);
        
        $params = [
            "siteName" => $site_name,
            "nome" => $request["nome"],
            "email" => $request["email"],
            "tel" => $request["tel"],
            "cidade" => $request["cidade"],
            "mensagem" => $request["mensagem"],
        ];
        
        $content = $mustache->render($template,$params);
        
        if (!empty($content)) {

            $email_params = [
                
                'to' => $this->config['sendEmailTo'],
                'subject' => $site_name. i::__("Formulário de dúvidas", 'FormCommunication'),
                'body' => $content,
            ];
            
            if ($app->createAndSendMailMessage($email_params)){
                $_SESSION['form_communication_mess']['type'] = 'success';
                $_SESSION['form_communication_mess']['menssage'] = i::__("Email enviado com sucesso!", 'FormCommunication');
            }else {
                $_SESSION['form_communication_mess']['type'] = 'danger';
                $_SESSION['form_communication_mess']['menssage'] =  i::__("Erro ao enviar o email!", 'FormCommunication');
            }
           
        }
        $url = $app->createUrl('formcommunication','communication');
        $app->redirect($url);
    }
}