<?php
require_once 'libre.php';

$libro1 = new Libro("Il signore degli anelli", "J.R.R. Tolkien", 1954);
$libro2 = new Libro("1984", "George Orwell", 1949);

$dvd1 = new DVD("Inception", "Christopher Nolan", 2010);

echo "Numero totale di libri: " . Libro::getNumeroLibriDisponibili() . "<br/>"; 
echo "Numero totale di DVD: " . DVD::getNumeroDVDDisponibili() . "<br/>"; 

$libro1->presta();
$libro2->presta();
$dvd1->presta();

echo "Numero totale di libri: " . Libro::getNumeroLibriDisponibili() . "<br/>"; 
echo "Numero totale di DVD: " . DVD::getNumeroDVDDisponibili() . "<br/>"; 

$libro1->restituisci();
echo "Numero totale di libri: " . Libro::getNumeroLibriDisponibili() . "<br/>"; 
?>