<?php

class Cercle {
    // Attribut pour le rayon
    public $rayon;

    // Constructeur pour initialiser le rayon
    public function __construct($rayon) {
        $this->rayon = $rayon;
    }

    // Méthode pour changer le rayon
    public function changerRayon($nouveauRayon) {
        $this->rayon = $nouveauRayon;
    }

    // Méthode pour afficher les informations du cercle
    public function afficherInfos() {
        echo "Rayon : " . $this->rayon . "\n";
        echo "Circonférence : " . $this->circonference() . "\n";
        echo "Diamètre : " . $this->diametre() . "\n";
        echo "Aire : " . $this->aire() . "\n";
    }

    // Méthode pour calculer la circonférence
    public function circonference() {
        return 2 * pi() * $this->rayon;
    }

    // Méthode pour calculer l'aire
    public function aire() {
        return pi() * pow($this->rayon, 2);
    }

    // Méthode pour calculer le diamètre
    public function diametre() {
        return 2 * $this->rayon;
    }
}

// Exemple d'utilisation
$cercle1 = new Cercle(4);
$cercle2 = new Cercle(7);

echo "Cercle 1 :\n";
$cercle1->afficherInfos();

echo "\nCercle 2 :\n";
$cercle2->afficherInfos();

?>