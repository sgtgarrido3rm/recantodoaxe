<?php
	/**
	* Criado em 27/04/2016.
	* 
	* Biblioteca de funcoes uteis.
	* 
	* @author Luis Olavo Garrido (sgtgarrido3rm@gmail.com)
	* @version 0.0.2
	*/

	/**
	 * Converte a data do formato yyyy-mm-dd para dd/mm/yyyy.
	 *
	 * @param string $data
	 * @param string $strSeparador
	 * @return string
	 */
	function DataParaISO($data = null, $strSeparador = "-")
	{
		if (!$data)
		{
			return "";
		}
		else 
		{
			$data = explode(" ", $data);

			if (isset($data[1]))
				$hora = $data[1];

			$data = explode($strSeparador, $data[0]);
			$ano = $data[2];
			$mes = $data[1];
			$dia = $data[0];
			
			if(!isset($hora)){
				return $ano."-".$mes."-".$dia;
			}else{
				return $ano."-".$mes."-".$dia. " ".$hora;
			}
		}
	}
	
	/**
	 * Converte a data do formato dd/mm/yyyy para yyyy-mm-dd.
	 *
	 * @param string $data
	 * @return string
	 */
	function DataParaBR($data = null, $strSeparador = "/")
	{
		if (!$data)
		{
			return "";
		}
		else 
		{
			$data = explode(" ", $data);
			$hora = $data[1];
			$data = explode($strSeparador, $data[0]);
			$ano = $data[2];
			$mes = $data[1];
			$dia = $data[0];
	
			if(is_null($hora)){
				return $ano."-".$mes."-".$dia;
			}else{
				return $ano."-".$mes."-".$dia. " ".$hora;
			}
			
		}
	}

	/**
	 * Escreve somente a hora de uma data no formato yyyy-mm-dd hh:mm:ss.
	 *
	 * @param string $data
	 * @return string
	 */	
	function EscreverHora($data = null)
	{
		if (!$data)
		{
			return "";
		}
		else 
		{
			$data = explode(" ", $data);
			$data = explode(":", $data[1]);
			return $data[0].":".$data[1].":".$data[2];
		}	
	}
	
	/**
	 * Compara 2 arrays e verifica se eles tem algum campo em comum.
	 *
	 * @param array $array1
	 * @param array $array2
	 * @return boolean
	 */
	function CompararElementosDeArrays($array1, $array2)
	{
		foreach ($array1 as $campo)
		{
			if (in_array($campo, $array2))
			{
				return true;
			}
		}
		return false;
	}

	/**
	 * Realiza o upload.
	 *
	 * @param array $arquivo
	 * @param string $pasta
	 * @param string $tipo
	 * @param string $nome
	 * @return mixed Caso o upload seja realizado com sucesso retorna uma string com o nome do arquivo, caso contrrio retorna false.
	 */
	function EnviarArquivo($arquivo, $pasta, $tipo, $nome = "") 
	{
		if ($tipo == "img")
		{
			
			// lista de tipos permitodos para imagens
			$colecaoTiposPermitidos  = array(  
			'image/pjpeg'	=> 'jpg',
			'image/jpeg'	=> 'jpg',
			'image/jpeg'	=> 'jpeg',
			'image/JPG'		=> 'jpg'
			);
	   
			// verifica se o tipo do arquivo enviado  um tipo permitido
			if(!array_key_exists($arquivo["type"], $colecaoTiposPermitidos))
			{
				return false; // se o arquivo no  um tipo desses, sai da funo
								//  necessrio alterar a funo para retornar um 
								// codigo de erro e mostrar uma mensagem para o
								// usuario na tela
	    	}
	    }
		else if ($tipo == "doc")
		{
			
			// lista de tipos permitodos para imagens
			$colecaoTiposPermitidos  = array(  
			'application/octet-stream'	=> '*'
			);
	   
			// verifica se o tipo do arquivo enviado  um tipo permitido
			if(array_key_exists($arquivo["type"], $colecaoTiposPermitidos))
			{
				return false; // se o arquivo no  um tipo desses, sai da funo
								//  necessrio alterar a funo para retornar um 
								// codigo de erro e mostrar uma mensagem para o
								// usuario na tela
	    	} 
			else if($arquivo["type"]=='text/plain')
			{
				$nome_arquivo = explode(".",$arquivo["name"]);
				$extensao = $nome_arquivo[(count($nome_arquivo))-1];
				if ($extensao == "bat" || $extensao == "NT"){
					return false; // se o arquivo no  um tipo desses, sai da funo
								//  necessrio alterar a funo para retornar um 
								// codigo de erro e mostrar uma mensagem para o
								// usuario na tela
				}
	    	}
		}
		// esta parte pega a extenso do arquivo enviado
		$nome_arquivo = explode(".",$arquivo["name"]);
		$total_partes = count($nome_arquivo);
		$extensao = $nome_arquivo[$total_partes-1];
		
		// retira os pontos do arquivo
		for ($x=0; $x <$total_partes; $x++)
		{
			if ($x == ($total_partes-1))
			{
				$parte .= "." . $nome_arquivo[$x];
			}
			else 
			{
				$parte .= $nome_arquivo[$x];
			}
		}
		
		if ($nome == "") // se no veio um padro de nome
		{ //monta a partir do nome do arquivo que foi enviado
			
			$nomeDoArquivo = $parte;
		}
		else 
		{
			$nomeDoArquivo = $nome.".".$extensao;
		}
		
		// tira os espaos em branco e pontos no nome do arquivo
		$nomeDoArquivo = str_replace(" ", "_", $nomeDoArquivo);
		
		// verifica se a pasta passada por parametro
		// eh realmente uma pasta. Se no for, 
		// tenta cri-la com as permisses necessrias
		if (!is_dir($pasta))
		{
			@mkdir($pasta, 0777);
		}
		
		// faz o upload finalmente
		if (move_uploaded_file($arquivo['tmp_name'],$pasta."/".$nomeDoArquivo))
		{
			return $nomeDoArquivo;
		}
		else 
		{
			return false;
		}
	}

	/**
	 * Exclui um arquivo.
	 *
	 * @param string $arquivo
	 * @return boolean
	 */
	function ExcluirArquivo($arquivo)
	{
		
		if (is_file($arquivo)) // se  um arquivo vlido
		{
			if (@unlink($arquivo))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else // se o arquivo passado por parametro pra funcao, nao eh um arquivo valido
		{
			return false;
		}
	}


	/**
	 * Retorna a extenso de um arquivo.
	 *
	 * @param string $nomeDoArquivo
	 * @param string $case
	 * @return string
	 */
	function ObterExtensao($arquivo, $case = "maiuscula")
	{
		$arquivo = explode(".", $arquivo);
		$tamanhoArray = count($arquivo);
		$ext = $arquivo[$tamanhoArray - 1];
		if ($case == "maiuscula")
		{
			$ext = strtoupper($ext);
		}
		else if ($case == "minuscula")
		{
			$ext = strtolower($ext);
		}
		else if ($case == "primeira")
		{
			$ext = ucfirst($ext);
		}
		return $ext;
	}

	/**
	 * Recebe o caminho de um arquivo e devolve o tamanho dele em Kb.
	 *
	 * @param string $arquivo
	 * @return int
	 */
	function ObterTamanhoArquivo($arquivo)
	{
		if (!is_file($arquivo))
		{
			return 0;
		}
		
		$tamanho = filesize($arquivo);
		$tamanho = ceil($tamanho / 1024); // para retornar o tamanho em kb - arredondado para cima
		// $tamanho = $tamanho / 1024; para transformar em Mb
		return $tamanho;
	}

	/**
	 * Retorna o valor mximo possvel para upload no servidor.
	 *
	 * @return string
	 */
	function calcularMaximoUpload()
	{
		if (ini_get("upload_max_filesize") < ini_get("post_max_size"))
		{
			$maximo = ini_get("upload_max_filesize");
		}
		else
		{
			$maximo = ini_get("post_max_size");
		}
		$maximo = str_replace("M", "Mb", $maximo);
	
		return $maximo;
	}

	/**
	 * Trata as variavis contra SQL Injection.
	 *
	 * @param string $dado
	 * @return string
	 */
	function EvitarInjecao($dado, $key = null)
	{
		$colecaoProibida = "<>&'";
		
		$dado = addcslashes($dado,$colecaoProibida);
		
		return $dado;
	}
	
	/**
	 * Trata os erros de acordo com os parmetros informados.
	 *
	 * @param int $tipo
	 * @param string $msg
	 * @param string $arquivo
	 * @param int $linha
	 * @return void
	 */
	function TratarErro($tipo, $msg, $arquivo, $linha)
	{
		$erro = "Arquivo {$arquivo} : linha {$linha} : {$msg} ";
		
		switch ($tipo)
		{
			case E_USER_WARNING:
				echo $erro;
			break;
			case E_USER_ERROR:
				echo $erro;
				exit;
			break;
		}
	}
	
	/**
	 * Verifica se  um e-mail vlido.
	 *
	 * @param string $email
	 * @return boolean
	 */
	function ValidarEmail($email)
	{
		if (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email))
		{
			return true;
		}
		else
		{
    		return false;
		} 
	}
	
	/**
	 * Verifica se  um cpf/cnpj vlido.
	 *
	 * @param string $entrada Aceita formato s numeros e formato com caracteres especiais
	 * @return boolean
	 */
	function ValidarCpfCnpj($entrada)
	{		
		// retira os caracteres de separao inclusive espaos
		$s=ereg_replace("[' '-./ \t]",'',$entrada);
				
		// pega o tamanho da string menos 2 que so os digitos verificadores
		$len=strlen($s)-2; 
		
		if ($len != 9 && $len != 12)
		{
			return false;
		}

		// pega so a parte do numero sem o dv
		$num= substr($s,0,$len); 
		
		// pega somente o dv
		$dv = substr($s,-2); 

		// verifica o primeiro dv
		$d1 = 0; 
		for ($i = 0; $i < $len; $i++) 
		{
			if ($len==11)
			{
				// cnpj
				$d1 += $num[11 - $i] * (2 + ($i % 8));
			}
			else
			{
				// cpf
				$d1 += $num[$i] * (10 - $i);
			}
		}

		if ($d1==0)
		{
			return false;
		}

		$d1 = 11 - ($d1 % 11);
		
		if ($d1 > 9)
		{
			$d1 = 0;
		}
		
		if ($dv[0] != $d1)
		{
			return false;
		}

		// verifica o segundo dv
		$d1 *= 2;
		for ($i = 0; $i < $len; $i++)
		{
			if ($len==11)
			{
				// cnpj
				$d1 += $num[11 - $i] * (2 + (($i + 1) % 8));
			}
			else
			{
				//cpf
				$d1 += $num[$i] * (11 - $i);
			}
		}

		$d1 = 11 - ($d1 % 11);
		if ($d1 > 9) 
		{
			$d1 = 0;
		}
		if ($dv[1] != $d1)
		{
			return false;
		}

		return true;
	}

	/**
	 * Envia um e-mail.
	 *
	 * @param string $para
	 * @param string $assunto
	 * @param string $de
	 * @param string $nomeDe
	 * @param string $corpo
	 */
	function EnviarEmail($para, $assunto, $de, $nomeDe, $corpo)
	{
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=utf-8\n";
		$headers .= "From: ".$de." <".utf8_decode($nomeDe)."> \n";
		$headers .= "X-Priority: 1\n";
		$headers .= "X-MSMail-Priority: High\n";
		$headers .= "X-Mailer:  Just My Server";
	
		mail($para, $assunto, $corpo, $headers);
		
		return true;
	}
	
	/**
	 * Retira os caracteres e strings perigosas
	 *
	 * @param string $dado
	 * @return string
	 */
	function RetirarMascara($dado)
	{
		$colecaoProibida = array(" ","-","_","(",")","\\","/", ".");
		$dado = str_replace($colecaoProibida, "", $dado);
		return $dado;
	}
	
	/**
	 * Abre e Fecha paragrafos
	 *
	 * @param string $dado
	 * @param string $css
	 * @return string Formatada
	 */
	function FormataParagrafos($dado,$css = NULL)
	{
		$dadobr	= nl2br($dado);
		if($css != NULL)
		{
			$pm	= "</p>\r\n<p class=\"".$css."\">";
			$p	= '<p class=\"".$css."\">';
		}
		else
		{
			$pm = "</p>\r\n<p>";
			$p	= '<p>';
		}
		$dadors = str_replace("<br />\r\n<br />",$pm, $dadobr);
		
		return $p.$dadors.'</p>';
	}
	/**
	 * Abre e Fecha paragrafos
	 *
	 * @param string $dado
	 * @param string $css
	 * @return string Formatada
	 */
	function FormataHora($dado) 
	{
		$dado = explode(':', $dado);
		
		if($dado[1] == '00')
		{	
			return $dado[0].'h ';
		}
		else
		{
			return $dado[0].'h :'.$dado[1].'min';
		}
		
	}
	/**
	 * cria um arrey meses INT em STR
	 *
	 * @param string $lead (com ou sem zero)
	 * @return string Formatada
	 */
	function getMeses($lead = "")
	{
		if ($lead != "0") { $lead = ""; }
		
		$mesext = array($lead.'1' => 'Janeiro', $lead.'2' => 'Fevereiro', $lead.'3' => 'Mar&ccedil;o', $lead.'4' => 'Abril',
						$lead.'5' => 'Maio', $lead.'6' => 'Junho', $lead.'7' => 'Julho', $lead.'8' => 'Agosto',
						$lead.'9' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
		return $mesext;
	}

	/**
	 *
	 * @param string $lead (com ou sem zero)
	 * @return string Formatada
	 */
	function getMesAbreviado($mes)
	{
		if (!empty($mes) and $mes > 0 and $mes < 13) {
				
			switch ($mes) {
				case 1:
					$mesAbreviado = 'JAN';
					break;
				
				case 2:
					$mesAbreviado = 'FEV';
					break;

				case 3:
					$mesAbreviado = 'MAR';
					break;

				case 4:
					$mesAbreviado = 'ABR';
					break;

				case 5:
					$mesAbreviado = 'MAIO';
					break;

				case 6:
					$mesAbreviado = 'JUN';
					break;

				case 7:
					$mesAbreviado = 'JUL';
					break;

				case 8:
					$mesAbreviado = 'AGO';
					break;

				case 9:
					$mesAbreviado = 'SET';
					break;

				case 10:
					$mesAbreviado = 'OUT';
					break;

				case 11:
					$mesAbreviado = 'NOV';
					break;

				case 12:
					$mesAbreviado = 'DEZ';
					break;
			}
			return $mesAbreviado;
		}
	}

	/**
	 * Calcula a diferença entre duas datas
	 *
	 * @param string $dataInicio
	 * @param string $dataFim
	 * @return int Dias
	 */
	function CalcularDiferencaDias($dataInicio, $dataFim){
		// Função que retorna o timestamp de uma data no formato DD/MM/AAAA
		function geraTimestamp($data) {
			$partes = explode('/', $data);
			return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
		}

		// Define os valores a serem usados
		$data_inicial	= $dataInicio; //date('d/m/Y');
		$data_final		= $dataFim; //'25/07/2013';

		// Usa a função criada e pega o timestamp das duas datas:
		$time_inicial = geraTimestamp($data_inicial);
		$time_final = geraTimestamp($data_final);

		// Calcula a diferença de segundos entre as duas datas:
		$diferenca = $time_final - $time_inicial; // 19522800 segundos

		// Calcula a diferença de dias
		$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

		// Exibe uma mensagem de resultado:
		$retorno = $dias;
	
		return $retorno;
	}

	function getBrowser()
	{		
		$useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('|Android|',$useragent,$matched)) {
                $sistema = 'Android';
        } elseif (preg_match('|Ubuntu|',$useragent,$matched)) {
                $sistema = 'Ubuntu';
        } elseif (preg_match('|Linux|',$useragent,$matched)) {
                $sistema = 'Linux';
        } elseif (preg_match('|Win|',$useragent,$matched)) {
                $sistema = 'Windows';
        } else {
        		$sistema = addslashes($useragent);
        }


		
		if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'IE';
		} elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'Opera';
		} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'Firefox';
		} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'Chrome';
		} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'Safari';
		} else {
		// browser not recognized!
		$browser_version = 0;
		$browser= 'Não identificado';
		}
		return "Browser: $browser Ver: $browser_version Sist: $sistema";
	}

	/**
	* Função para salvar mensagens de LOG
	*
	* @param string $mensagem - A mensagem a ser salva	
	*/
	function salvarLog($mensagem,$usuario){	  
		$ip = getIP();	  
		$dataHora = date('d-m-Y H:i:s');	 
		$mensagem = mysql_escape_string($mensagem);	  
		$browser = getBrowser();
	
 		$linha = $usuario."|".$ip."|".$browser."|".$dataHora."|".$mensagem."\n";

 		$manipular = fopen(ARQUIVO_LOGS, "a+b");
 	 	fwrite($manipular, $linha);
	  	fclose($manipular);		 
	}

	/**
	* Função para salvar mensagens de LOG
	*
	* @param string $mensagem - A mensagem a ser salva	
	*/
	function salvarLogEmail($mensagem){	  
		$dataHora = date('d-m-Y H:i:s');	 
		$mensagem = mysql_escape_string($mensagem);	  
	
 		$linha = $dataHora."|".$mensagem."\n";

 		$manipular = fopen(ARQUIVO_LOGS, "a+b");
 	 	fwrite($manipular, $linha);
	  	fclose($manipular);		 
	}

	/**
	* Função para pegar o IP do usuário
	*
	* @return string $ip	
	*/
	function getIP(){	  
		$ip = $_SERVER['REMOTE_ADDR'];	  
		return $ip;
	}
	
	/**
	 * Printa Var Dump com tags <PRE>
	 *
	 * @param string $dado
	 * @return string Formatada
	 */
	function debug($tmp_var) 
	{
		echo("<h3>" . $_SERVER ['PHP_SELF'] . "</h3>");
		echo "<div align='left'><pre>";
		var_dump($tmp_var);
		echo "</pre></div>";
		die("Para debug sem die utilize: debugl");
	}

	/**
	 * Printa Var Dump com tags <PRE>
	 *
	 * @param string $dado
	 * @return string Formatada
	 */
	function debugl($tmp_var) 
	{
		echo "<h3>" . $_SERVER ['PHP_SELF'] . "</h3>";
		echo "Para debug com die utilize: debug";
		echo "<div align='left'><pre>";
		var_dump($tmp_var);
		echo "</pre></div>";			
	}
?>