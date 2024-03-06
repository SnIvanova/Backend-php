<?php
interface Prestito {
    public function presta();
    public function restituisci();
}

abstract class MaterialeBibliotecario implements Prestito {
    protected static $contatoreMateriale = 0;
    protected static $contatoreLibri = 0;
    protected static $contatoreDVD = 0;

    public function presta(){
        if (static::$contatoreMateriale > 0) {
            static::$contatoreMateriale--;
            static::aggiornaContatori(-1);
        } else {
            throw new Exception("nothing avaliaable " . static::getTipoMateriale());
        }
    }

    public function restituisci(){ 
        static::$contatoreMateriale++;
        static::aggiornaContatori(1);
    }

    public static function getNumeroMaterialeDisponibile() {
        return static::$contatoreMateriale;
    }

    public static function getNumeroLibriDisponibili() {
        return static::$contatoreLibri;
    }

    public static function getNumeroDVDDisponibili() {
        return static::$contatoreDVD;
    }

    protected static function aggiornaContatori($incremento) {
        if (static::getTipoMateriale() === "libri") {
            static::$contatoreLibri += $incremento;
        } else {
            static::$contatoreDVD += $incremento;
        }
    }

    abstract public static function getTipoMateriale();
}

class Libro extends MaterialeBibliotecario {
    private $titolo;
    private $autore;
    private $annoPubblicazione;

    public function __construct($titolo, $autore, $annoPubblicazione) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->annoPubblicazione = $annoPubblicazione;
        static::$contatoreMateriale++;
        static::$contatoreLibri++;
    }

    public static function getTipoMateriale() {
        return "libri";
    }
}

class DVD extends MaterialeBibliotecario {
    private $titolo;
    private $regista;
    private $annoPubblicazione;

    public function __construct($titolo, $regista, $annoPubblicazione) {
        $this->titolo = $titolo;
        $this->regista = $regista;
        $this->annoPubblicazione = $annoPubblicazione;
        static::$contatoreMateriale++;
        static::$contatoreDVD++;
    }

    public static function getTipoMateriale() {
        return "DVD";
    }
}
?>
