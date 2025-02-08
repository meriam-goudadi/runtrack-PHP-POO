<?php

class Operation1{
    public int $nombre1;
    public int $nombre2;

    public function __construct(?int $nombre1 = 1, ?int $nombre2 = 2)
    {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }
}

$operation = new Operation1();

echo "nombre1: " . $operation->nombre1 . "<br>";
echo "nombre2: " . $operation->nombre2 . "<br>";
?>