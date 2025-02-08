<?php
class Personne {
    public string $nom;
    public string $prenom;

    function __construct(string $nom, string $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    function SePresenter(): string {
        return $this->prenom . " " . $this->nom;
    }
}
$personne1 = new Personne($nom = "Doe", $prenom = "Jane");
echo "Je m'appelle ", $personne1->SePresenter();
?>