<?php

// name of our namspace
namespace Controller;

// use nosModels
use Models\nosModels AS DT;

// class for publicController
class publicController{

    // method for "acceuil"
    public static function welcomeAction($twig){
        // recup datas from model
        $datas = DT::accueilDatas();
        // view racine model
        echo $twig->render("base.html.twig");
    }

}