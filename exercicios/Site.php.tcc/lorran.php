<?php 
<?php
class Carro {
    // Atributos
    public $marca;
    public $cor;
    public $velocidade;

    public function __construct($marca, $cor) {
        $this->marca = $marca;
        $this->cor = $cor;
        $this->velocidade = 0;
    }

    public function acelerar($km) {
        $this->velocidade += $km;
        echo "Acelerou para {$this->velocidade} km/h<br>";
    }

    public function frear($km) {
        $this->velocidade -= $km;
        if ($this->velocidade < 0) $this->velocidade = 0;
        echo "Reduziu para {$this->velocidade} km/h<br>";
    }
}

$meuCarro = new Carro("Ford", "Vermelho");
$carroDoAmigo = new Carro("Toyota", "Azul");

$meuCarro->acelerar(50);
$meuCarro->frear(20);

$carroDoAmigo->acelerar(80);
$carroDoAmigo->frear(30);
?>
