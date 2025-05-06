<?php 
class Produto{

    
    public $nome;
    public $preco;
    public $quantidade;

    public function exibeInformacoes()
    {
        echo "Nome:" ,$this-> nome ; 
        echo " Preço: $this->preco  "; 
        echo " Quantidade: $this->quantidade <br>";
    }

    

}


$produto = new Produto();
$produto->nome = "Caneta, ";
$produto->preco =  2.5;
$produto->quantidade =  10;

$produto -> exibeInformacoes();

$produto2 = new Produto();
$produto2->nome = "Borracha,";
$produto2->preco = 3;
$produto2->quantidade = 15;
$produto2->exibeInformacoes();



function mostrarMediaPrecos($produto, $produto2){
    $preco1 = $produto->preco;
    $preco2 = $produto2->preco;

    $media = ($preco1 + $preco2) /2;

    echo "Média dos preços: $media <br>";
}
    mostrarMediaPrecos($produto, $produto2);



?>