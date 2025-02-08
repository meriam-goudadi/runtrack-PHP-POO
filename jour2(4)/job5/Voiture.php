<?php
class Voiture {
    private $marque;
    private $modele;
    private $annee;
    private $kilometrage;
    private $en_marche;
    private $reservoir;

    // Constructeur
    public function __construct($marque, $modele, $annee, $kilometrage) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
        $this->en_marche = false;
        $this->reservoir = 50; 
    }

    // Vérifie le niveau du réservoir (méthode privée)
    private function verifier_plein() {
        return $this->reservoir;
    }

    // Démarrer la voiture
    public function demarrer() {
        if ($this->verifier_plein() > 5) {
            $this->en_marche = true;
            echo "La voiture a démarré.<br>";
        } else {
            echo "Carburant insuffisant pour démarrer.<br>";
        }
    }

    // Arrêter la voiture
    public function arreter() {
        $this->en_marche = false;
        echo "La voiture est arrêtée.<br>";
    }
}

// Création d'un objet Voiture
$voiture = new Voiture("Toyota", "Corolla", 2020, 15000);

// Tentative de démarrer
$voiture->demarrer();

// Arrêter la voiture
$voiture->arreter();
?>
