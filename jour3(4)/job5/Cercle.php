<?php
class Cercle extends Forme {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function aire() {
        return pi() * pow($this->radius, 2);
    }
}

// Instancier Rectangle et Cercle et tester aire()
$rect = new Rectangle(10, 5);
$cercle = new Cercle(7);

echo "Aire du rectangle : " . $rect->aire() . "<br>";
echo "Aire du cercle : " . $cercle->aire() . "<br>";
?>
