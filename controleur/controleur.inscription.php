<?php
    require_once("modele/modele.inscription.php");
    class Controleur {
        /*le controleur realise les controles des données avan leur injections dans la BDD
        ou aprè leur extraction de la BDD. Il appelle le modèle pour réaliser les requetes. */
        private $uneInscriptionModele ; //instance de la classe Modele

        public function __construct (){
            //instanciation du Modele
            $this->uneInscriptionModele = new Modele();
        }
    }