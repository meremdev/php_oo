<?php
    class ClienteService{
        public static function informaInadimplentes($mailer){
            $inadinplentes = Cliente::getInadimplentes();

            foreach($inadinplentes as $cliente){
                $mailer->setHtmlBody();
                $mailer->addAddress($cliente->email);
                $mailer->setHtmlBody("Hei <b>$cliente->nome</b>, cumpra com suas obrigações");
                $mailer->send();
            }
        }
    }

    //substituir
    //ClienteService::informaInadimplentes( new oldEmailService );

    //por
    ClienteService::informaInadimplentes( new PHPMailerAdapter );
