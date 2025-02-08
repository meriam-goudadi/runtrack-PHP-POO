<?php
class Personne {
    protected $age;

    public function __construct($age = 14) {
        $this->age = $age;
    }

    public function bonjour() {
        echo "Hello<br>";
    }

    public function afficherAge() {
        echo "J'ai {$this->age} ans<br>";
    }

    public function modifierAge($age) {
        $this->age = $age;
    }
}

class Eleve extends Personne {
    public function allerEnCours() {
        echo "Je vais en cours<br>";
    }

    public function afficherAge() {
        echo "J’ai {$this->age} ans<br>";
    }
}

class Professeur extends Personne {
    private $matiereEnseignee;

    public function __construct($age, $matiereEnseignee) {
        parent::__construct($age);
        $this->matiereEnseignee = $matiereEnseignee;
    }

    public function enseigner() {
        echo "Le cours va commencer<br>";
    }
}

// Instancier une Personne et un Élève
$eleve = new Eleve();
$eleve->afficherAge(); // Affiche 14
?>
