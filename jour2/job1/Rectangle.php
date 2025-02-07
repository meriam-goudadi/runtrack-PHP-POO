<?php
class Rectangle {
    // Attributs privés
    private $longueur;
    private $largeur;

    // Constructeur
    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    // Getter pour la longueur
    public function getLongueur() {
        return $this->longueur;
    }

    // Setter pour la longueur
    public function setLongueur($longueur) {
        $this->longueur = $longueur;
    }

    // Getter pour la largeur
    public function getLargeur() {
        return $this->largeur;
    }

    // Setter pour la largeur
    public function setLargeur($largeur) {
        $this->largeur = $largeur;
    }
}

// Instanciation d'un rectangle avec longueur = 10 et largeur = 5
$rectangle = new Rectangle(10, 5);

// Affichage des valeurs initiales
echo "Longueur : " . $rectangle->getLongueur() . "<br>";
echo "Largeur : " . $rectangle->getLargeur() . "<br>";

// Modification des valeurs
$rectangle->setLongueur(15);
$rectangle->setLargeur(8);

// Vérification des modifications
echo "Nouvelle longueur : " . $rectangle->getLongueur() . "<br>";
echo "Nouvelle largeur : " . $rectangle->getLargeur() . "<br>";
?>
