<?php

class Calculo{
	protected $m1; #nota m1.
	protected $nd; #nota dicliplina.
	protected $ni; #nota integrada.
	protected $m2; #nota m2.
	protected $me; #média final.

	public function __construct($m1, $nd, $ni){
		$this->m1 = $m1;
		$this->nd = $nd;
		$this->ni = $ni;
		$this->calculaM2();
		$this->calculaMedia();
	}

	public function getM1(){
		return $this->m1;
	}

	public function getNd(){
		return $this->nd;
	}

	public function getNi(){
		return $this->ni;
	}

	#essa função calcula a nota da m2.
	public function calculaM2(){
		$this->m2 = number_format((($this->nd * 0.70 )+( $this->ni * 0.30)),2);
	}

	public function getM2(){
		return $this->m2;
	}
	# essa função tem uma simula uma sobrecarga de 
	public function calculaMedia(){
		$n = func_num_args(); #quantiade de parametros.
		$a = func_get_args(); #array dos parametros.
		if($n == 0){
			$this->me = number_format((($this->m1 + ($this->m2 * 2)) / 3),2);
		}elseif($n = 1){
			return number_format((($this->m1 + ($a[0] * 2)) / 3),2);		
		}else{
			echo "quantiade de parametros invalidos";
		}
		return 0;
	}


	public function getMedia(){
		return $this->me;
	}
	#Essa função rertona quando o aluno tem que tirar na diciplina e integrada para passar.
	public function falta(){
		$m2 = 0;
		while(true){
			$n = $this->calculaMedia($m2);
			if($n == 5.0){
				return number_format($m2,2);
			}
			$m2 = $m2 + 0.01;
		}
		return $m2;
	}

	public function status(){
		if($this->me >= 5){
			$s = "Aprovado";
		}elseif(($this->me >= 3) && ($this->me <= 4.9)){
			$s = "De exame";
		}else{
			$s = "Reprovado";
		}
		return $s;
	}

	public function mostra(){
		echo "M1: ".$this->getM1()."</br>";
		echo "Diciplina: ".$this->getNd()."</br>";
		echo "Integrada: ".$this->getNi()."</br>";
		echo "M2: ".$this->getM2()."</br>";
		echo "Media: ".$this->getMedia()."</br>";
		echo "Nota minima*: ".$this->falta()."</br>";
		echo "Status Aluno: ".$this->Status()."</br>";
	}

}#fim da classe Calculo.

$objeto = new Calculo(2.5,6.3,6.3);
$objeto->mostra();



?>