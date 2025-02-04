<?php
class Operation {
    public int $nombre1;
    public int $nombre2;

    function __construct(int $nombre1, int $nombre2) {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }

    function addition(): int {
        return $this->nombre1 + $this->nombre2;
    }
}
$operation = new Operation(5, 3);
echo "La somme est de : ", $operation->addition();
?>