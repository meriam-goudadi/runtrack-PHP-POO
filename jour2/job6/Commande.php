<?php
class Commande {
    private $numCommande;
    private $listePlats;
    private $statut;

    // Constructeur
    public function __construct($numCommande) {
        $this->numCommande = $numCommande;
        $this->listePlats = [];
        $this->statut = "en cours";
    }

    // Ajouter un plat à la commande
    public function ajouterPlat($nom, $prix) {
        if ($prix > 0) {
            $this->listePlats[] = ["nom" => $nom, "prix" => $prix];
            echo "Plat ajouté : $nom - $prix €<br>";
        } else {
            echo "Erreur : Le prix doit être positif.<br>";
        }
    }

    // Annuler la commande
    public function annulerCommande() {
        $this->statut = "annulée";
        echo "Commande annulée.<br>";
    }

    // Calculer le total des plats (méthode privée)
    private function calculerTotal() {
        $total = 0;
        foreach ($this->listePlats as $plat) {
            $total += $plat["prix"];
        }
        return $total;
    }

    // Calculer la TVA (20%)
    public function calculerTVA() {
        return $this->calculerTotal() * 0.2;
    }

    // Afficher la commande avec le total à payer
    public function afficherCommande() {
        echo "Commande #{$this->numCommande}<br>";
        echo "Statut : {$this->statut}<br>";
        echo "Plats commandés :<br>";
        foreach ($this->listePlats as $plat) {
            echo "- {$plat["nom"]} : {$plat["prix"]} €<br>";
        }
        echo "Total à payer : " . $this->calculerTotal() . " €<br>";
        echo "TVA (20%) : " . $this->calculerTVA() . " €<br>";
    }
}

// Création d'une commande
$commande = new Commande(101);

// Ajout de plats
$commande->ajouterPlat("Pizza", 12);
$commande->ajouterPlat("Salade", 7);
$commande->ajouterPlat("Dessert", 5);

// Affichage de la commande
$commande->afficherCommande();

// Annulation de la commande
$commande->annulerCommande();
?>
