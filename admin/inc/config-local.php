<?php
	/**
	* Criado em 26/03/2025.
	* 
	* Arquivo de configuracao da aplicacao.
	* 
	* @author Luis Olavo Garrido (sgtgarrido3rm@gmail.com)
	* @version 0.0.1	
	*/
	@session_start();
	error_reporting(E_ALL);
	header("Content-type: text/html; charset=utf-8");
	//header('Content-Type: text/html; charset=iso-8859-1');

	/**
	 * Define a data final
	 *
	 * @name DIAFIM
	 * ex = "dd/mm/aaaa"
	 */
	define("DIAFIM","31/12/2025");

	/**
	 * Define o ano
	 *
	 * @name ANO
	 * ex = "aaaa"
	 */
	define("ANO",date('Y'));

	/**
	 * Define o ano Copyright
	 *
	 * @name COPYRIGHT
	 * ex = "aaaa"
	 */
	define("COPYRIGHT",date('Y'));

	/**
	 * Define o servidor do banco de dados da aplicacao
	 *
	 * @name SERVIDOR
	 */
	define("SERVIDOR","localhost");
	
	/**
	 * Define o usuario do banco de dados da aplicacao
	 *
	 * @name USUARIO
	 */	
	define("USUARIO","root");
	
	/**
	 * Define o senha do banco de dados da aplicacao
	 *
	 * @name SENHA
	 */	
	define("SENHA","");
		
	/**
	 * Define o banco utilizado na aplicacao
	 *
	 * @name BANCO
	 */	
	define("BANCO","recantodoaxe");
		
	/**
	 * Define o tipo de banco de dados da aplicacao
	 *
	 * @name TIPO_BANCO
	 */	
	define("TIPO_BANCO","mysqli");
	
	/**
	 * Define o titulo do projeto
	 *
	 * @name TITULO
	 */
	define("TITULO","Recanto do Axé - RS");
	
	/**
	 * Define a mensagem de acesso negado
	 *
	 * @name MSG_ACESSO_NEGADO
	 */
	define("MSG_ACESSO_NEGADO",'Você não está autorizado. Faça o login');

	/**
	 * Define a mensagem de acesso inválido
	 *
	 * @name MSG_ACESSO_INVALIDO
	 */
	define("MSG_ACESSO_INVALIDO",'Usuário/Senha inválido. Você não está autorizado.');

	/**
	 * Define a mensagem de erro de conexao com o bd
	 *
	 * @name MSG_ACESSO_NEGADO_BD
	 */
	define("MSG_ACESSO_NEGADO_BD",'ERRO DE CONEXÃO.');

	/**
	 * Define a mensagem de erro de gravação dos dados no bd
	 *
	 * @name MSG_ERRO_GRAVAR_BD
	 */
	define("MSG_ERRO_GRAVAR_BD",'ERRO AO GRAVAR OS DADOS.');

	/**
	 * Define a mensagem de consulta vazia
	 *
	 * @name MSG_CONSULTA_VAZIA
	 */
	define("MSG_CONSULTA_VAZIA",'ESTA CONSULTA NÃO RETORNOU NENHUM RESULTADO');

	/**
	 * Define a mensagem de usuario/senha inválido
	 *
	 * @name MSG_CONSULTA_VAZIA
	 */
	define("MSG_USUARIO_SENHA",'USUÁRIO/SENHA INVÁLIDO');

	/**
	 * Define a mensagem de dados gravados com sucesso
	 *
	 * @name MSG_SUCESSO
	 */
	define("MSG_SUCESSO",'DADOS GRAVADOS COM SUCESSO');

	/**
	 * Define a mensagem de dados atualizados com sucesso
	 *
	 * @name MSG_ATUALIZACAO_SUCESSO
	 */
	define("MSG_ATUALIZACAO_SUCESSO",'DADOS ATUALIZADOS COM SUCESSO');

	/**
	 * Define a mensagem de cpf inválido
	 *
	 * @name MSG_CPF_INVALIDO
	 */
	define("MSG_CPF_INVALIDO",'CPF inválido');

	/**
	 * Define a mensagem de logoff
	 *
	 * @name MSG_LOGOFF_SUCESSO
	 */
	define("MSG_LOGOFF_SUCESSO",'Logoff realizado com sucesso!');

	/**
	 * Define a mensagem de erro ao enviar e-mail
	 *
	 * @name MSG_ERRO_EMAIL
	 */
	define("MSG_ERRO_EMAIL",'Inscrição efetuada com sucesso.<br />E-Mail não pode ser enviado<br />');

	/**
	 * Define a mensagem de logoff
	 *
	 * @name CAMPO_VAZIO
	 */
	define("CAMPO_VAZIO",'Campo obrigatório vazio');

	/**
	 * Define o e-mail do administrador
	 *
	 * @name EMAIL
	 */	
	define("EMAIL","sgtgarrido3rm@gmail.com");
	
	/**
	 * Exibe o e-mail de contato
	 *
	 * @name EXIBE_EMAIL
	 */	
	define("EXIBE_EMAIL", false);
	
	/**
	 * Define o asssunto
	 *
	 * @name ASSUNTO
	 */

	define("ASSUNTO","Contato Recanto do Axé - RS");
	
	/**
	 * Define o nome que aparecera no remetente dos e-mails
	 *
	 * @name NOME_EMAIL
	 */
	define("NOME_EMAIL","Recanto do Axé - RS");
	
	/**
	 * Define o dominio do site
	 *
	 * @name DOMINIO
	 */
	define("DOMINIO","http://".$_SERVER['HTTP_HOST']."/recantodoaxe/");

	/**
	 * Define o caminho dos arquivos
	 *
	 * @name PATH
	 */
	define("PATH",$_SERVER['DOCUMENT_ROOT']."/recantodoaxe/"); //usar em ambiente localhost

	/**
	 * Define o nome e caminho dos logs
	 *
	 * @name ARQUIVO_LOGS
	 */
	define("ARQUIVO_LOGS",PATH."/logs/log_".date('d-m-y').".log");
	
	/**
	 * Define o idoma do site
	 *
	 * @name IDIOMA
	 * 1 = PT-BR
	 * 2 = Ingles
	 */
	define("IDIOMA","1");
	
	/**
	* DEFINIÇÃO DINÂMICA DA CONSTANTE DO DIRETÓRIO DAS CLASSES
	* 
	* @author Luis Olavo Garrido <sgtgarrido3rm@gmail.com>
	*/
	if(is_dir("classe"))	
	{	
	 	define("CAMINHO_CLASSE","classe/");
	}
	elseif(is_dir("../classe"))
	{
	 	define("CAMINHO_CLASSE","../classe/");
	}
	elseif(is_dir("../../classe"))
	{
	 	define("CAMINHO_CLASSE","../../classe/");
	}elseif(is_dir("../../../classe"))
	{
	 	define("CAMINHO_CLASSE","../../../classe/");
	}

	/**
	* DEFINIÇÃO DINÂMICA DA CONSTANTE DO DIRETÓRIO DE INCLUDES
	* 
	* @author Luis Olavo Garrido <sgtgarrido3rm@gmail.com>
	*/
	if(is_dir("inc"))
	{	
	 	define("CAMINHO_INCLUDE","inc/");
	}
	elseif(is_dir("../inc"))
	{
	 	define("CAMINHO_INCLUDE","../inc/");
	}
	elseif(is_dir("../../inc"))
	{
	 	define("CAMINHO_INCLUDE","../../inc/");
	}elseif(is_dir("../../../inc"))
	{
	 	define("CAMINHO_INCLUDE","../../../inc/");
	}


	// Includes necessarios
//	require_once('db.conecta.php');	
	require_once('Funcao.php');
?>
