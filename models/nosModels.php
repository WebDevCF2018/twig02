<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 26/09/2018
 * Time: 10:42
 */

namespace Models;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class nosModels
{
    public static function accueilDatas()
    {
        // return a table with datas for accueil
        return ['title' => 'Notre page d\'accueil',
            'h1' => "Bienvenues",
            'h2' => "Sur notre site",
            'content' => ["Premier paragraphe", "Deuxième paragraphe", "Paragraphe final"]


        ];
    }

    public static function formDatas()
    {
        return ['content' => '<form action="" name="lui" method="post"><input name="themail" type="email" placeholder="Votre mail" required><br/><textarea name="thetext" placeholder="Votre message" required></textarea><br><input type="submit" value="Envoyer"></form> '];
    }

    public static function envoieMail(Array $datas){
        $themail = filter_var($_POST['themail'], FILTER_VALIDATE_EMAIL);
        $thetext = strip_tags($_POST['thetext']);
        $aqui = "michaeljpitz@gmail.com";

        // Create the Transport
        $transport = (new Swift_SmtpTransport('relay.skynet.be', 25))
            ->setUsername('michael')
            ->setPassword('')
        ;

// Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

// Create a message
        $message = (new Swift_Message('Depuis twig02'))
            ->setFrom([$themail])
            ->setTo([$aqui])
            ->setBody($thetext)
        ;

// Send the message
      return  $result = $mailer->send($message);


/*

ex version

        if(@mail($aqui,"test de notre site",$thetext,'From: '.$aqui . "\r\n" .
     'Reply-To: ' .$aqui. "\r\n" .
     'X-Mailer: PHP/' . phpversion())){
            return true;
        }else{
            return false;
        }
*/
    }

}