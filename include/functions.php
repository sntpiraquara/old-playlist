<?php
function redirect($local){
	header("location:$local");
	exit;
}

function dd($arquivo){
	echo "<pre>";
	var_dump($arquivo);
	echo "</pre>";
	exit;
}

function base_path($destination){
	$path = dirname(__DIR__) . '/';
	return $path . $destination;
}

function validacao($dados, $regras){
	$erros = [];

	foreach ($regras as $campo => $condicoes) {
		$condicoes = explode('|', $condicoes);
		$valor = $dados["$campo"];

		foreach($condicoes as $regra){

		//CHECKS IF THE FIELD IS FILLED
			if ($regra == 'preenchido') {
				if (empty($valor)) {
					$erros[$campo] = $campo . ' não preenchido';
				}
			}
//VALIDATE E-MAIL
			else if ($regra == 'email') {
				if (!strstr($valor, '@')) {
					$erros[$campo] = $campo . ' não é E-mail';
				}

//CHECKS THE PASSWORD
			}elseif ($regra == 'confirmacao') {
				$confirmacao = $dados['confirmar_' . $campo];

				//CHECKS IF THE PASSWORDS DO NOT COMMENT
				if (!isEquals($valor, $confirmacao)) {
					$erros[$campo] = $campo . ' não confere';
				}

//CHECKS IF THE DATE IT IS VALID
			}elseif ($regra == 'data') {
				$segmentos = explode('-', $valor);
				if (count($segmentos) != 3) {
					$erros[$campo] = $campo . ' não é uma data válida';
				}
			}
			//sexo
			elseif (strstr($regra, 'in:')) {
				$regra = str_replace('in:' , '', $regra);
				$valores = explode(',', strtolower($regra));
				$valor = strtolower($valor);

				if (!in_array($valor, $valores)) {
					$erros[$campo] = $campo . ' não permitido!';
					
				}
			}
			if (isset($erros[$campo])) {
				break;
			}
		}
	}
		//RETURN THE #ERRORS
	return $erros;
}

function temErro($campo){
	if (isset($_SESSION['erros'][$campo])){ 
		return $_SESSION['erros'][$campo];
	}
	return false;

}


