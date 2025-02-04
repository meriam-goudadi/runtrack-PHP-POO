<?php

class Animal {
    // Attributs de la classe
    public int $age;
    public string $nom;

    // Constructeur pour initialiser les attributs
    public function __construct() {
        $this->age = 0; // Initialisation de l'âge à 0
        $this->nom = ""; // Initialisation du prénom à une chaîne vide
    }
    public function afficherAge() {
        echo "L'âge de l'animal est : " . $this->age . "<br>" . "\n";
    }
    // Méthode pour faire vieillir l'animal
    public function vieillir() {
        $this->age += 1; // Ajoute 1 à l'âge de l'animal
    }
    public function nommer() {
        echo "Et il se nomme " . $this->nom = "Junior" . "\n"; // Nomme l'animal
    }
}

// Instanciation d'un objet Animal
$animal = new Animal ();

// Affichage de l'âge initial de l'animal
$animal->afficherAge(); // Affiche : L'âge de l'animal est : 0 ans.

// Faire vieillir l'animal
$animal->vieillir();

// Affichage du nouvel âge de l'animal
$animal->afficherAge(); // Affiche : L'âge de l'animal est : 1 ans.

// Nommer l'animal
$animal->nommer();
?>