<?php
class Rectangle {
    protected $longueur;
    protected $largeur;

    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function perimetre() {
        return 2 * ($this->longueur + $this->largeur);
    }

    public function surface() {
        return $this->longueur * $this->largeur;
    }
}

class Parallelepipede extends Rectangle {
    private $hauteur;

    public function __construct($longueur, $largeur, $hauteur) {
        parent::__construct($longueur, $largeur);
        $this->hauteur = $hauteur;
    }

    public function volume() {
        return $this->surface() * $this->hauteur;
    }
}

// Instancier Rectangle et tester les méthodes
$rect = new Rectangle(10, 5);
echo "Périmètre : " . $rect->perimetre() . "<br>";
echo "Surface : " . $rect->surface() . "<br>";

// Instancier Parallelepipede et tester ses méthodes
$para = new Parallelepipede(10, 5, 8);
echo "Volume : " . $para->volume() . "<br>";
?>
