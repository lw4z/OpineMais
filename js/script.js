 function consultacep(cep){
  cep = cep.replace(/\D/g,"")
      url="http://cep.correiocontrol.com.br/"+cep+".js"
      s=document.createElement('script')
      s.setAttribute('charset','utf-8')
      s.src=url
      document.querySelector('head').appendChild(s)
    }

    function correiocontrolcep(valor){
      if (valor.erro) {
        alert('CEP Inválido, Tente novamente.');        
        return;
      };

      document.getElementById('cidade').value=valor.localidade
      document.getElementById('estado').value=valor.uf
      document.getElementById('bairro').value=valor.bairro
      document.getElementById('rua').value=valor.logradouro
    }
    
    /*
     * VALIDADOR DE SENHAS  
     */
    function validarSenha(){
    	senhaNova = document.f1.senhaNova.value
    	confirmarSenha = document.f1.confirmarSenha.value
    	
    	if(senhaNova != confirmarSenha){
    		alert("Senhas Incompatíveis!")
    		document.f1.confirmarSenha.focus()
    	}
    }
   
    /*
     * DO PRINTNG
     * 
     * */
    
   function DoPrinting(){
        if (!window.print){
         alert("Use o Google Chrome")
         return
       }
       window.print()
    }
   
   
   
 //**************VALIDA TELEFONE***************
   function ValidaTelefone(telefone){
	   exp = /\(\d{2}\)\ \d{4}\-\d{4}/
   	if(!exp.test(telefone.value))
   		alert('Número de Telefone Inválido, tente novamente!');
   }
   
 //adiciona mascara ao telefone
   function MascaraTelefone(telefone){	
   	if(mascaraInteiro(telefone)==false){
   		event.returnValue = false;
   	}	
   	return formataCampo(telefone, '(00) 0000-0000', event);
   }
   //
 //valida numero inteiro com mascara
   function mascaraInteiro(){
   	if (event.keyCode < 48 || event.keyCode > 57){
   		event.returnValue = false;
   		return false;
   	}
   	return true;
   }//
   
 //formata de forma generica os campos
   function formataCampo(campo, Mascara, evento) { 
   	var boleanoMascara; 
   	
   	var Digitato = evento.keyCode;
   	exp = /\-|\.|\/|\(|\)| /g
   	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
      
   	var posicaoCampo = 0;	 
   	var NovoValorCampo="";
   	var TamanhoMascara = campoSoNumeros.length;; 
   	
   	if (Digitato != 8) { // backspace 
   		for(i=0; i<= TamanhoMascara; i++) { 
   			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
   								|| (Mascara.charAt(i) == "/")) 
   			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
   								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
   			if (boleanoMascara) { 
   				NovoValorCampo += Mascara.charAt(i); 
   				  TamanhoMascara++;
   			}else { 
   				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
   				posicaoCampo++; 
   			  }	   	 
   		  }	 
   		campo.value = NovoValorCampo;
   		  return true; 
   	}else { 
   		return true; 
   	}
   }
 //**************VALIDA TELEFONE***************
   
    /*
     * VALIDADOR DE CPF
     */
    
    function validarCPF( cpf ){
    	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
    	
    	if(!filtro.test(cpf))
    	{
    		window.alert("CPF inválido. Tente novamente.");
    		return false;
    	}
       
    	cpf = remove(cpf, ".");
    	cpf = remove(cpf, "-");
    	
    	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
    		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
    		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
    		cpf == "88888888888" || cpf == "99999999999")
    	{
    		window.alert("CPF inválido. Tente novamente.");
    		return false;
       }

    	soma = 0;
    	for(i = 0; i < 9; i++)
    	{
    		soma += parseInt(cpf.charAt(i)) * (10 - i);
    	}
    	
    	resto = 11 - (soma % 11);
    	if(resto == 10 || resto == 11)
    	{
    		resto = 0;
    	}
    	if(resto != parseInt(cpf.charAt(9))){
    		window.alert("CPF inválido. Tente novamente.");
    		return false;
    	}
    	
    	soma = 0;
    	for(i = 0; i < 10; i ++)
    	{
    		soma += parseInt(cpf.charAt(i)) * (11 - i);
    	}
    	resto = 11 - (soma % 11);
    	if(resto == 10 || resto == 11)
    	{
    		resto = 0;
    	}
    	
    	if(resto != parseInt(cpf.charAt(10))){
    		window.alert("CPF inválido. Tente novamente.");
    		return false;
    	}
    	
    	return true;
     }
     
    function remove(str, sub) {
    	i = str.indexOf(sub);
    	r = "";
    	if (i == -1) return str;
    	{
    		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
    	}
    	
    	return r;
    }
    
    /*
     * VALIDADOR CNPJ
     */		
    function validarCNPJ(cnpj){

    	cnpj = cnpj.replace(/\./g, "");
    	cnpj = cnpj.replace(/\-/g, "");
    	cnpj = cnpj.replace(/\_/g, "");
    	cnpj = cnpj.replace(/\//g, "");

    	if(cnpj.length!=14){ var result = false; };

    	pri = eval(cnpj.substring(0,2));
    	seg = eval(cnpj.substring(3,6));
    	ter = eval(cnpj.substring(7,10));
    	qua = eval(cnpj.substring(11,15));
    	qui = eval(cnpj.substring(16,18));

    	var i;
    	var numero;
    	var situacao = "";

    	numero = (pri+seg+ter+qua+qui);

    	s = numero;

    	c = cnpj.substr(0,12);
    	var dv = cnpj.substr(12,2);
    	var d1 = 0;

    	for (i = 0; i < 12; i++){
    	d1 += c.charAt(11-i)*(2+(i % 8));
    	}

    	if (d1 == 0){
    	var result = false;
    	}
    	d1 = 11 - (d1 % 11);

    	if (d1 > 9) d1 = 0;

    	if (dv.charAt(0) != d1){
    	var result = false;
    	}

    	d1 *= 2;
    	for (i = 0; i < 12; i++){
    	d1 += c.charAt(11-i)*(2+((i+1) % 8));
    	}

    	d1 = 11 - (d1 % 11);
    	if (d1 > 9) d1 = 0;

    	if (dv.charAt(1) != d1){
    	var result = false;
    	}

    	if (result == false) {
    	alert("CNPJ inválido, tente novamente!");
    	} 
    	}
   
    
  
    /*Mascara aqui*/
    
    function mascara(o,f){
    	v_obj=o
    	v_fun=f
    	setTimeout("execmascara()",1)
    }

    function execmascara(){
    	v_obj.value=v_fun(v_obj.value)
    }

    function cpf_mask(v){
    	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
    	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    	return v
    }
    function cnpj_mask(v){
        v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
        return v
    }
    	  

$(function(){
	$('.links a').click(function(){
	var classe = $(this).attr('title');
		$('#jogos').removeClass().addClass(classe);
	})
})




$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(2000); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});