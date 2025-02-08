<?php
// Faire dire bonjour et aller en cours
$eleve->bonjour();
$eleve->allerEnCours();
$eleve->modifierAge(15);
$eleve->afficherAge(); // Affiche 15

// Instancier un professeur et l'utiliser
$prof = new Professeur(40, "Mathématiques");
$prof->bonjour();
$prof->enseigner();
?>
