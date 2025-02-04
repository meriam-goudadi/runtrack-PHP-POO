<?php

class Produit {
    // Attributs
    private $nom;
    private $prixHT;
    private $TVA;

    // Constructeur pour initialiser les attributs
    public function __construct($nom, $prixHT, $TVA) {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
        $this->TVA = $TVA;
    }

    // Méthode pour calculer le prix TTC
    public function CalculerPrixTTC() {
        return $this->prixHT * (1 + $this->TVA);
    }

    // Méthode pour afficher les informations du produit
    public function afficher() {
        return "Nom : " . $this->nom . ", Prix HT : " . $this->prixHT . ", TVA : " . $this->TVA . ", Prix TTC : " . $this->CalculerPrixTTC();
    }

    // Méthodes pour modifier les attributs
    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function setPrixHT($nouveauPrixHT) {
        $this->prixHT = $nouveauPrixHT;
    }

    // Méthodes pour retourner les attributs
    public function getNom() {
        return $this->nom;
    }

    public function getPrixHT() {
        return $this->prixHT;
    }

    public function getTVA() {
        return $this->TVA;
    }
}

// Exemple d'utilisation
$produit1 = new Produit("Laptop", 800, 0.20);
$produit2 = new Produit("Smartphone", 400, 0.20);

echo $produit1->afficher() . "\n"; // Affiche les informations du produit 1
echo $produit2->afficher() . "\n"; // Affiche les informations du produit 2

// Modifier le nom et le prix du produit 1
$produit1->setNom("Ordinateur Portable");
$produit1->setPrixHT(900);

echo $produit1->afficher() . "\n"; // Affiche les nouvelles informations du produit 1

?>