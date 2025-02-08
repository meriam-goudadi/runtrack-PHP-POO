<?php
class Vehicule {
    protected $marque;
    protected $modele;
    protected $annee;
    protected $prix;

    public function __construct($marque, $modele, $annee, $prix) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

    public function informationsVehicule() {
        return "Marque: {$this->marque}, Modèle: {$this->modele}, Année: {$this->annee}, Prix: {$this->prix} €";
    }

    public function demarrer() {
        return "Attention, je roule.";
    }
}

class Voiture extends Vehicule {
    private $portes;

    public function __construct($marque, $modele, $annee, $prix, $portes = 4) {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->portes = $portes;
    }

    public function informationsVehicule() {
        return parent::informationsVehicule() . ", Portes: {$this->portes}";
    }

    public function demarrer() {
        return "La voiture démarre en douceur.";
    }
}

class Moto extends Vehicule {
    private $roues;

    public function __construct($marque, $modele, $annee, $prix, $roues = 2) {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->roues = $roues;
    }

    public function informationsVehicule() {
        return parent::informationsVehicule() . ", Roues: {$this->roues}";
    }

    public function demarrer() {
        return "La moto vrombit et part en trombe !";
    }
}

// Instancier et tester les classes
$voiture = new Voiture("Toyota", "Corolla", 2022, 25000);
$moto = new Moto("Yamaha", "R1", 2021, 18000);

echo $voiture->informationsVehicule() . "<br>";
echo $voiture->demarrer() . "<br>";

echo $moto->informationsVehicule() . "<br>";
echo $moto->demarrer() . "<br>";
?>
