<?php

class Personnage {
    // Attributs pour la position
    public int $x;
    public int $y;

    // Constructeur pour initialiser la position
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    // Méthode pour aller à gauche
    public function gauche() {
        $this->x--;
    }

    // Méthode pour aller à droite
    public function droite() {
        $this->x++;
    }

    // Méthode pour aller en haut
    public function haut() {
        $this->y--;
    }

    // Méthode pour aller en bas
    public function bas() {
        $this->y++;
    }

    // Méthode pour afficher la position
    public function position() {
        return "Position : (" . $this->x . ", " . $this->y . ")";
    }
}

// Exemple d'utilisation
$personnage = new Personnage(0, 0); // Position initiale (0, 0)
echo $personnage->position() . "\n"; // Affiche : Position : (0, 0)

$personnage->droite(); // Déplace à droite
echo $personnage->position() . "\n"; // Affiche : Position : (1, 0)

$personnage->bas(); // Déplace en bas
echo $personnage->position() . "\n"; // Affiche : Position : (1, 1)

?>