<?php

class Calendar {

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octrobre', 'Novembre', 'Décembre'];
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    public $mois;
    public $annee;
    private $semaines;
    

    //J'utilise la date du jour par défaut
    public function __construct($mois = null, $annee = null) {  

        if ($mois === null) {
            $mois = intval(date('m'));
        }

        if ($annee === null) {
            $annee = intval(date('Y'));
        }

        if ($mois < 1) {
            $mois = 12;
            $annee -= 1;
        }

        if ($mois > 12) {
            $mois = 1;
            $annee += 1;
        }

        if ($annee === null) {
            $annee = intval(date('Y'));
        }

        $this->mois = $mois;
        $this->annee = $annee;
    }

    //Méthode pour ecrire les mois en lettre. Si on est sur le mois 1 il faut aller chercher l'index 0 du tableau $months
    public function toString() {
        return $this->months[$this->mois - 1].' '.$this->annee; 
    }

    //Renvoi le premier jour du mois
    public function getFirstDay() {
        return new Datetime("{$this->annee}-{$this->mois}-01");
    }

    //Renvoi le nombre de semaine dans le mois
    public function getWeeks() {
        //Classe DateTime("A-m-j")
        $debut = $this->getFirstDay();
        //La fonction modify() modifie la valeur de $debut. C'est pour ça qu'on crée un clone de $debut pour obtenir la date de fin du mois
        $fin = clone $debut;
        $fin->modify('+1month -1day');
        //format() permet de formater la date en semaines
        $semaines = intval($fin->format('W') - intval($debut->format('W'))) + 1;
        if ($semaines < 0) {
            $semaines = 6  ;
        }
        return $semaines;
    }

    //Affiche le mois suivant
    public function nextMonth() {
        $mois = $this->mois + 1;
        $annee = $this->annee;
        return new Calendar($mois, $annee);
    }

    //Affiche le mois précédent
    public function previousMonth() {
        $mois = $this->mois - 1;
        $annee = $this->annee;
        return new Calendar($mois, $annee);
    }
}


