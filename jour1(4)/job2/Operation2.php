<?php

class Operation2
{
    public int $nombre1;
    public int $nombre2;

    function __construct(?int $nombre1 = 1, ?int $nombre2 = 2)
    {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }

    function calcule(): string
    {
        $resultat = "La somme de $this->nombre1 et $this->nombre2 est: " . ($this->nombre1 + $this->nombre2);
        return $resultat;
    }
}

$operation = new Operation2();
echo($operation->calcule());

?>