<?php

class Point {
    // Attributs de la classe
    public int $x;
    public int $y;

    // Constructeur pour initialiser les attributs x et y
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    // Méthode pour afficher les coordonnées du point
    public function afficherLesPoints() {
        echo "Coordonnées du point : (" . $this->x . ", " . $this->y . ")\n";
    }

    // Méthode pour afficher la coordonnée x
    public function afficherX() {
        echo "Coordonnée x : " . $this->x . "\n";
    }

    // Méthode pour afficher la coordonnée y
    public function afficherY() {
        echo "Coordonnée y : " . $this->y . "\n";
    }

    // Méthode pour changer la valeur de x
    public function changerX($nouveauX) {
        $this->x = $nouveauX;
    }

    // Méthode pour changer la valeur de y
    public function changerY($nouveauY) {
        $this->y = $nouveauY;
    }
}

// Exemple d'utilisation de la classe Point
$point = new Point(3, 5);

// Affichage des coordonnées initiales
$point->afficherLesPoints(); // Affiche : Coordonnées du point : (3, 5)

// Affichage de x et y séparément
$point->afficherX(); // Affiche : Coordonnée x : 3
$point->afficherY(); // Affiche : Coordonnée y : 5

// Changement des coordonnées
$point->changerX(10);
$point->changerY(20);

// Affichage des nouvelles coordonnées
$point->afficherLesPoints(); // Affiche : Coordonnées du point : (10, 20)

?>