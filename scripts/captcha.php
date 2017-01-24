<?php 

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