<?php
class Livre {
    private $titre;
    private $auteur;
    private $nbPages;
    private $disponible; // Nouvel attribut

    // Constructeur
    public function __construct($titre, $auteur, $nbPages) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->setNbPages($nbPages);
        $this->disponible = true; // Initialisation à True
    }

    // Getters et setters
    public function getTitre() { return $this->titre; }
    public function getAuteur() { return $this->auteur; }
    public function getNbPages() { return $this->nbPages; }
    public function setNbPages($nbPages) {
        if (is_int($nbPages) && $nbPages > 0) {
            $this->nbPages = $nbPages;
        } else {
            echo "Erreur : Le nombre de pages doit être un entier positif.<br>";
        }
    }

    // Vérification de la disponibilité
    public function verification() {
        return $this->disponible;
    }

    // Emprunter un livre
    public function emprunter() {
        if ($this->verification()) {
            $this->disponible = false;
            echo "Livre emprunté avec succès.<br>";
        } else {
            echo "Le livre est déjà emprunté.<br>";
        }
    }

    // Rendre un livre
    public function rendre() {
        if (!$this->verification()) {
            $this->disponible = true;
            echo "Livre rendu avec succès.<br>";
        } else {
            echo "Le livre est déjà disponible.<br>";
        }
    }
}

// Test de la classe
$livre = new Livre("1984", "George Orwell", 328);
$livre->emprunter(); // Emprunte le livre
$livre->emprunter(); // Tentative d'emprunt déjà emprunté
$livre->rendre();    // Rend le livre
$livre->rendre();    // Tentative de rendre un livre déjà disponible
?>
