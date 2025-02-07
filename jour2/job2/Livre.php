<?php
class Livre {
    // Attributs privés
    private $titre;
    private $auteur;
    private $nbPages;

    // Constructeur
    public function __construct($titre, $auteur, $nbPages) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->setNbPages($nbPages); // Utilisation du setter pour validation
    }

    // Getter pour le titre
    public function getTitre() {
        return $this->titre;
    }

    // Setter pour le titre
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Getter pour l'auteur
    public function getAuteur() {
        return $this->auteur;
    }

    // Setter pour l'auteur
    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    // Getter pour le nombre de pages
    public function getNbPages() {
        return $this->nbPages;
    }

    // Setter pour le nombre de pages (validation)
    public function setNbPages($nbPages) {
        if (is_int($nbPages) && $nbPages > 0) {
            $this->nbPages = $nbPages;
        } else {
            echo "Erreur : Le nombre de pages doit être un entier positif.<br>";
        }
    }
}

// Création d'un livre
$livre = new Livre("Le Petit Prince", "Antoine de Saint-Exupéry", 96);

// Affichage des informations du livre
echo "Titre : " . $livre->getTitre() . "<br>";
echo "Auteur : " . $livre->getAuteur() . "<br>";
echo "Nombre de pages : " . $livre->getNbPages() . "<br>";

// Tentative de modification avec une valeur invalide
$livre->setNbPages(-50);
?>
