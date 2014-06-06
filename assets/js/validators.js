function valCpf($cpf){
        $cpf = preg_replace('/[^0-9]/','',$cpf);
        $digitoA = 0;
        $digitoB = 0;
        for($i = 0, $x = 10; $i <= 8; $i++, $x--){
            $digitoA += $cpf[$i] * $x;
        }
        for($i = 0, $x = 11; $i <= 9; $i++, $x--){
            if(str_repeat($i, 11) == $cpf){
                return false;
            }
            $digitoB += $cpf[$i] * $x;
        }
        $somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
        $somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
        if($somaA != $cpf[9] || $somaB != $cpf[10]){
            return false;
        }else{
            return true;
        }
}

function validarCpf(cpf){
    var digitsString = cpf.replace(/[^0-9]/g, '');
    var digits;
    var a,b,c,d,e,f,g,h,i,j,k;
    var dv1, dv2;
    var soma, resto;

    if (digitsString.length == 11){
        digits = digitsString.split('');
        a = parseInt(digits[ 0 ]);
        b = parseInt(digits[ 1 ]);
        c = parseInt(digits[ 2 ]);
        d = parseInt(digits[ 3 ]);
        e = parseInt(digits[ 4 ]);
        f = parseInt(digits[ 5 ]);
        g = parseInt(digits[ 6 ]);
        h = parseInt(digits[ 7 ]);
        i = parseInt(digits[ 8 ]);
        j = parseInt(digits[ 9 ]);
        k = parseInt(digits[ 10 ]);
        soma = a*10 + b*9 + c*8 + d*7 + e*6 + f*5 + g*4 + h*3 + i*2;
        resto = soma % 11;
        dv1 = (11 - resto < 10 ? 11 - resto : 0);
        soma = a*11 + b*10 + c*9 + d*8 + e*7 + f*6 + g*5 + h*4 + i*3 + dv1*2;
        resto = soma % 11;
        dv2 = (11 - resto < 10 ? 11 - resto : 0);
        return dv1 == j && dv2 == k;
    }
    return false;
}


function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/[^\d]+/g,'');

    if(cnpj == '') return false;

    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;

    return true;

}