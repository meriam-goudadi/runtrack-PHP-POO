<?php
class Carte {
    public $valeur;
    public $couleur;

    public function __construct($valeur, $couleur) {
        $this->valeur = $valeur;
        $this->couleur = $couleur;
    }

    public function getValeur() {
        if (in_array($this->valeur, ["J", "Q", "K"])) {
            return 10;
        } elseif ($this->valeur == "A") {
            return 11; // Gestion de l'As plus tard
        }
        return intval($this->valeur);
    }

    public function afficherCarte() {
        return "{$this->valeur} de {$this->couleur}";
    }
}

class Jeu {
    private $paquet = [];
    private $joueur = [];
    private $croupier = [];

    public function __construct() {
        $valeurs = array_merge(range(2, 10), ["J", "Q", "K", "A"]);
        $couleurs = ["Cœur", "Carreau", "Trèfle", "Pique"];

        foreach ($valeurs as $valeur) {
            foreach ($couleurs as $couleur) {
                $this->paquet[] = new Carte($valeur, $couleur);
            }
        }

        shuffle($this->paquet);
    }

    public function tirerCarte() {
        return array_pop($this->paquet);
    }

    public function calculerPoints($main) {
        $total = 0;
        $nbAs = 0;

        foreach ($main as $carte) {
            $total += $carte->getValeur();
            if ($carte->valeur == "A") {
                $nbAs++;
            }
        }

        while ($total > 21 && $nbAs > 0) {
            $total -= 10; // Transformer un As de 11 en 1 si nécessaire
            $nbAs--;
        }

        return $total;
    }

    public function distribuerCartes() {
        $this->joueur = [$this->tirerCarte(), $this->tirerCarte()];
        $this->croupier = [$this->tirerCarte(), $this->tirerCarte()];
    }

    public function afficherMain($main) {
        return implode(", ", array_map(fn($c) => $c->afficherCarte(), $main));
    }

    public function jouer() {
        $this->distribuerCartes();

        echo "Votre main : " . $this->afficherMain($this->joueur) . " (" . $this->calculerPoints($this->joueur) . " points)<br>";
        echo "Croupier : " . $this->croupier[0]->afficherCarte() . " et une carte cachée.<br>";

        while ($this->calculerPoints($this->joueur) < 21) {
            $choix = readline("Voulez-vous prendre une carte ? (o/n) : ");
            if (strtolower($choix) == "o") {
                $this->joueur[] = $this->tirerCarte();
                echo "Nouvelle main : " . $this->afficherMain($this->joueur) . " (" . $this->calculerPoints($this->joueur) . " points)<br>";
            } else {
                break;
            }
        }

        if ($this->calculerPoints($this->joueur) > 21) {
            echo "Vous avez dépassé 21 ! Vous perdez.<br>";
            return;
        }

        echo "Tour du croupier...<br>";

        while ($this->calculerPoints($this->croupier) < 17) {
            $this->croupier[] = $this->tirerCarte();
        }

        echo "Main finale du croupier : " . $this->afficherMain($this->croupier) . " (" . $this->calculerPoints($this->croupier) . " points)<br>";

        if ($this->calculerPoints($this->croupier) > 21 || $this->calculerPoints($this->joueur) > $this->calculerPoints($this->croupier)) {
            echo "Vous gagnez !<br>";
        } else {
            echo "Le croupier gagne.<br>";
        }
    }
}

// Lancer une partie de Blackjack
$jeu = new Jeu();
$jeu->jouer();
?>
