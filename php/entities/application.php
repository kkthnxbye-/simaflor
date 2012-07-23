<?php

class Application{

	private $app_id;
	private $app_variable;
	private $app_valor;

/*GET's*/

public function getId(){
	return $this->app_id;
}

public function getVariable(){
	return $this->app_variable;
}

public function getValor(){
	return $this->app_valor;
}

/*SET's*/

public function setId($id){
	$this->app_id = $id;
}

public function setVariable($variable){
	$this->app_variable = $variable;
}

public function setValor($valor){
	$this->app_valor = $valor;
}

}
