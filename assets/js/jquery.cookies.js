/*!
 * Agência Webnauta JavaScript v1.0
 * http://agenciawebnauta.com
 *
 * Copyright 2013 Agência Webnauta
 *
 * Referências: (http://www.quirksmode.org/js/cookies.html)
 */

/************ COOKIES **************/


/**========== CRIAR COOKIE ==========**/

//Função createCookie(); que cria os argumentos nome 'name', valor 'value' e número de dias que permanece ativo como 'days'
function createCookie(name,value,days) {
	//Se o existir valor no argumento 'days'
	if (days) {
		//Cria um novo objeto Date na variável date contendo a data atual
		var date = new Date();
		//Obtem o tempo atual e adiciona o número solicitado de dias, definindo a data com esse valor, contendo a data exata que o cokie vai expirar
		date.setTime(date.getTime()+(days*24*60*60*1000));
		//Define a variável expires na data atual no formato UTC/GMT exigido por cookies.
		var expires = "; expires="+date.toGMTString();
	}
	//Se não existir valor no argumento 'days', a variável expires recebe o valor nulo "" e o cookie expira assim que o usuário fechar o navegador
	else var expires = "";
	//Declara o cookie dentro do document.cookie na sintaxe correta.
	document.cookie = name+"="+value+expires+"; path=/";
}

/**========== /CRIAR COOKIE ==========**/


/**========== LER COOKIE ==========**/

//Função readCookie(); referente ao argumento 'name'
function readCookie(name) {
	//Cria a váriavel nameEQ com o valor do argumento 'name' seguido de um =
	var nameEQ = name + "=";
	//Divide o documento.cookie em ';', criando assim a variável array ca
	var ca = document.cookie.split(';');
	//Cria um for() que segue a quantidade de cookies de acordo com o tamanho da variável array ca
	for(var i=0;i < ca.length;i++) {
		//Nomeie a variável c com o valor referente ao cookie na array ca
		var c = ca[i];
		//Enquanto o primeiro caractere for nulo ' ', o valor de c deleta esse valor nulo localizado em 0, começa pelo 1 e vai até o valor final de caracteres em c (c.length)
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		//Se o valor da primeira palavra de c (indexOF()==0) é o valor de nameEQ, retorne o valor de c desde o seu inicio após o nome (nameEQ.length), até o valor total da variável c (c.length)
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	//Se não achar o cookie, retorna nulo
	return null;
}

/**========== /LER COOKIE ==========**/


/**========== DELETAR COOKIE ==========**/

//Função eraseCookie(); referente ao argumento 'name'
function eraseCookie(name) {
	//Chama a função createCookie(); com o nome com o argumento name, valor nulo e o day negativo, deletando no exato momento
	createCookie(name,"",-1);
}

/**========== /DELETAR COOKIE ==========**/