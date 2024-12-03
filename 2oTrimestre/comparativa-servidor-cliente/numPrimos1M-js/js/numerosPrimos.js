const DOM = {
    boton : document.getElementById("generarNumeros"),
    resultado : document.getElementById("resultado"),

}

DOM.boton.addEventListener("click", function() {
    const maximo = 1000000; //1M
    let arrayNumerosPrimos = [];

    for(let i = 1; i <= maximo; i++) {
        if(esPrimo(i)){
            arrayNumerosPrimos.push(i);
        }
    }
    //console.log(arrayNumerosPrimos);
    DOM.resultado.innerText = arrayNumerosPrimos.join(", ");
});

function esPrimo(numero){
    let auxDivisores = [];
    for (let divisor = 1; divisor <= numero; divisor++) {
        if (numero % divisor === 0) {
            auxDivisores.push(divisor);
        }
    }
    if(auxDivisores.length > 2){
        return false;
    } else {
        return true;
    }

}