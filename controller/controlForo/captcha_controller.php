<?php 
	
	$param = array();
	$param['opcion'] = '';

	if(isset($_POST['opcion']))
	{
	    $param['opcion'] = $_POST['opcion'];
	}

	if ($param['opcion'] == 'codigo_captcha') {
		$data['captcha'] = codigo_captcha();
		echo json_encode($data);
	}

	function codigo_captcha(){
		$k = "";
		$parametros = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";	
		$maximo = strlen($parametros)-1;
		for ($i=0; $i<=5; $i++){
			$k.=$parametros{mt_rand(0, $maximo)};
		}
		return $k;
	}

?>