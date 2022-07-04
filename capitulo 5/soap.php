<?php
//lib loader
require_once 'Lib/Livro/Core/ClassLoader.php';
$al = new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

//app loader
require_once 'Lib/Livro/Core/AppLoader.php';
$al = new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');
$al->register();

class LivroSoapServer {
    public function __call($method, $parameters)
    {
        // lê o parametro "class" da URL
        $class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';

        // aqui voçê deve  implementar algum mecanismo de controle
        if(!in_array($class, array('PessoaService'))){
            throw new SoapFault('server', 'Permission denied');
        }

        try {
            //verifica se a classe selecionada existe
            if(class_exists($class)){
                //verifica se o metdo requerido existe
                if(method_exists($class, $method)){
                    return call_user_func_array(array(new $class($_GET), $method), $parameters);
                }else{
                    //lança uma exeção SoapFault, com a mensagem a ser recebida do lado do client
                    throw new SoapFault('server', "metodo $class::$method não encomtrado");
                }
            }else{
                //lança uma exeção SoapFault, com a mensagem a ser recebida do lado do client
                throw new SoapFault('server', "Classe $class não encomtrado");

            }
        } catch (Exception $e) {
            throw new SoapFault('serve', $e->getMessage);
        }
    }
}

$server = new SoapServer(NULL, array('encoding' => 'UTF-8', 'uri' => 'http://test-uri/'));
$server->setClass('LivroSoapServer');
$server->handle();



   
