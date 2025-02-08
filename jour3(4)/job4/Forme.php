<?php
class Forme {
    public function aire() {
        return 0;
    }
}

class Rectangle extends Forme {
    protected $largeur;
    protected $hauteur;

    public function __construct($largeur, $hauteur) {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    public function aire() {
        return $this->largeur * $this->hauteur;
    }
}

// Instancier Rectangle et afficher l’aire
$rect = new Rectangle(10, 5);
echo "Aire du rectangle : " . $rect->aire() . "<br>";
?>
