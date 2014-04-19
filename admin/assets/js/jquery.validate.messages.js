$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();
		//reject defaults for IE placeholder fix
		jQuery.validator.addMethod("defaultInvalid", function(value, element) {
		switch (element.value) {

			case "usuario": 
				if (element.name == "usuario") return false;
			break;
			
			case "senha": 
				if (element.name == "senha") return false;
			break;

			case "email": 
				if (element.name == "email") return false;
			break;

			case "cpf": 
				if (element.name == "cpf") return false;
			break;

			case "cpf": 
				if (element.name == "cpf") return false;
			break;

			case "nomenovaplantacao": 
				if (element.name == "nomenovaplantacao") return false;
			break;

			case "nomenovaplantacaoeditar": 
				if (element.name == "nomenovaplantacaoeditar") return false;
			break;

			default: return true;
			break;
		} 
		});

		jQuery.validator.addMethod("cnpj", function(cnpj, element) {
		   cnpj = jQuery.trim(cnpj);// retira espaços em branco https://gist.github.com/diasfulvio/6059199
		   // DEIXA APENAS OS NÚMEROS cnpj: true
		   cnpj = cnpj.replace('/','');
		   cnpj = cnpj.replace('.','');
		   cnpj = cnpj.replace('.','');
		   cnpj = cnpj.replace('-','');
		 
		   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
		   digitos_iguais = 1;
		 
		   if (cnpj.length < 14 && cnpj.length < 15){
		      return false;
		   }
		   for (i = 0; i < cnpj.length - 1; i++){
		      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
		         digitos_iguais = 0;
		         break;
		      }
		   }
		 
		   if (!digitos_iguais){
		      tamanho = cnpj.length - 2
		      numeros = cnpj.substring(0,tamanho);
		      digitos = cnpj.substring(tamanho);
		      soma = 0;
		      pos = tamanho - 7;
		 
		      for (i = tamanho; i >= 1; i--){
		         soma += numeros.charAt(tamanho - i) * pos--;
		         if (pos < 2){
		            pos = 9;
		         }
		      }
		      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		      if (resultado != digitos.charAt(0)){
		         return false;
		      }
		      tamanho = tamanho + 1;
		      numeros = cnpj.substring(0,tamanho);
		      soma = 0;
		      pos = tamanho - 7;
		      for (i = tamanho; i >= 1; i--){
		         soma += numeros.charAt(tamanho - i) * pos--;
		         if (pos < 2){
		            pos = 9;
		         }
		      }
		      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		      if (resultado != digitos.charAt(1)){
		         return false;
		      }
		      return true;
		   }else{
		      return false;
		   }
		}, "Informe um CNPJ válido."); // Mensagem padrão //http://blog.shiguenori.com/2009/05/29/validar-cpf-cnpj-com-jquery-validate/ 

		jQuery.validator.addMethod("cpf", function (value, element) { //https://gist.github.com/diasfulvio/6059199
		    value = jQuery.trim(value);
		 
		    value = value.replace('.', '');
		    value = value.replace('.', '');
		    cpf = value.replace('-', '');
		    while (cpf.length < 11) cpf = "0" + cpf;
		    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
		    var a = [];
		    var b = new Number;
		    var c = 11;
		    for (i = 0; i < 11; i++) {
		        a[i] = cpf.charAt(i);
		        if (i < 9) b += (a[i] * --c);
		    }
		    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
		    b = 0;
		    c = 11;
		    for (y = 0; y < 10; y++) b += (a[y] * c--);
		    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
		    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return this.optional(element) || false;
		    return this.optional(element) || true;
		}, "Informe um CPF válido."); // Mensagem padrão 

		jQuery.validator.setDefaults({ignore: ".ignore"});

		jQuery.validator.addMethod("telefone", function (value, element) {
		    value = value.replace("(", "");
		    value = value.replace(")", "");
		    value = value.replace("-", "");
		    return this.optional(element) || /[0-9]{10}/.test(value);
		}, "Por favor, um telefone válido"); 

		// Celular (com 8 ou 9 dígitos)
		jQuery.validator.addMethod("celular", function (value, element) {
		value = value.replace("(", "");
		value = value.replace(")", "");
		value = value.replace("-", "");
		value = value.replace("_", "");
		value = value.replace(" ", "");
		return this.optional(element) || /[0-9]{10}/.test(value) || /[0-9]{11}/.test(value);
		}, "Informe um celular válido.");

		// CEP (Formato: 00000-000)
		jQuery.validator.addMethod("cep",function(e,t){return this.optional(t)||/^\d{5}-\d{3}?$/.test(e)},"Informe um CEP válido.");

		// validate signup form on keyup and submit
		$("#formLogin").validate({
			rules: {
				usuario: {
					required: true
				},
				senha: {
					required: true
				},
			},
			messages: {
				usuario: "Insira o usuário",
				senha: "Insira a senha",
			}
		});

		$("#formEmailList").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				email: "Email inválido",
			}
		});

		$("#formCpfList").validate({
			rules: {
				cpf: {
					required: true,
					cpf: true
				},
			},
			messages: {
				cpf: "Cpf inválido",
			}
		});

		$("#formPlantacaoList").validate({
			rules: {
				nomenovaplantacao: {
					required: true
				},
				/*imgnovaplantacao: {
			      extension: "jpg|jpeg|pdf|doc|docx|png",
			    },*/
			},
			messages: {
				nomenovaplantacao: "Preencher o nome",
				imgnovaplantacao: "Preencher o nome",
			}
		});

		$("#formEditPlantacaoList").validate({
			rules: {
				nomenovaplantacaoeditar: {
					required: true
				},
			},
			messages: {
				nomenovaplantacaoeditar: "Preencher o nome",
			}
		});

	});
	  //placeholders in IE
    // $('input').placeholder();