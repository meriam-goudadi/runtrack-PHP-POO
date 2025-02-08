<?php
class Student {
    private $nom;
    private $prenom;
    private $numEtudiant;
    private $credits;
    private $level;

    // Constructeur
    public function __construct($nom, $prenom, $numEtudiant) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numEtudiant = $numEtudiant;
        $this->credits = 0;
        $this->level = $this->studentEval();
    }

    // Ajout de crédits (doit être positif)
    public function add_credits($credits) {
        if ($credits > 0) {
            $this->credits += $credits;
            $this->level = $this->studentEval();
        } else {
            echo "Erreur : Les crédits doivent être supérieurs à zéro.<br>";
        }
    }

    // Évaluation du niveau (méthode privée)
    private function studentEval() {
        if ($this->credits >= 90) return "Excellent";
        if ($this->credits >= 80) return "Très bien";
        if ($this->credits >= 70) return "Bien";
        if ($this->credits >= 60) return "Passable";
        return "Insuffisant";
    }

    // Affichage des informations de l'étudiant
    public function studentInfo() {
        echo "Nom : {$this->nom}<br>";
        echo "Prénom : {$this->prenom}<br>";
        echo "Numéro Étudiant : {$this->numEtudiant}<br>";
        echo "Crédits : {$this->credits}<br>";
        echo "Niveau : {$this->level}<br>";
    }
}

// Instanciation de l'étudiant John Doe
$etudiant = new Student("Doe", "John", 145);

// Ajout de crédits
$etudiant->add_credits(20);
$etudiant->add_credits(40);
$etudiant->add_credits(50);

// Affichage des informations
$etudiant->studentInfo();
?>
