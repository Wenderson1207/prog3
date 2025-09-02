<?php
class Quarto{
    private $numero;
    private $preco;

    public function __construct($numero){
        $this->numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }
    
}
class standard extends Quarto{

    public function getPreco(){
            return $this->preco = 300.00;
    }
 }
class Deluxe extends Quarto{

    public $hospedes;
    public function getPreco($hospedes){
        if($hospedes > 2){
         $this->preco = (300.00 * 1.2)*1.1;
        }else
            return $this->preco = 300.00 *1.2;
    }
}
class Suite extends Quarto{
    public $dia;
    public function getPreco($dia){
        if($dia = 1 || $dia = 7){
            return $this->preco = (300.00 * 1.5)*1.5;
        }else
            return $this->preco = 300.00 * 1.5;
    }
}

$quarto1 = new Standard(101);
$quarto2 = new Deluxe(202);
$quarto3 = new Suite(303);  


echo "Quarto Standard: nº". $quarto1->getNumero().": R$ " . $quarto1->getPreco() . "<br>";
echo "Quarto Deluxe: nº". $quarto2->getNumero().": R$ " . $quarto2->getPreco(2) . "<br>";
echo "Quarto Suite: nº". $quarto3->getNumero().": R$ " . $quarto3->getPreco(1) . "<br>";
?>

