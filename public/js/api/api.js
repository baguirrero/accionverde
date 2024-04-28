document.getElementById("buscar").addEventListener('click', ajax);


function cargar(){
    data=document.getElementById("documento").value;
    console.log(data);
}


// function showContent() {
//     element = document.getElementById("div1");
//     check = document.getElementById("selecthijos");
//     if (check.value == "NO") {
//         element.style.display='block';
//     }
//     else {
//         element.style.display='none';
//     }
// }

function habilitar(){
    select = document.getElementById("identidad").value;
    val = 0;

    if(select === "2"){
        val++;
    }
    
    if(select === "3"){
        val++;
    }

    if(val === 0){
        document.getElementById("socialname").disabled = false;
    }else{
        document.getElementById("socialname").disabled = true;
    }
}

document.getElementById("identidad").addEventListener("change", habilitar);


function soloLetrasTildesNombreCampo(e) {
    try {
        key = window.event ? e.which : e.keyCode;
        
        tecla = String.fromCharCode(key).toLowerCase();
        
        /*
         * 8 - backspace
         */
        especiales = [8];
        tecla_especial = false;
        for (var i in especiales) {
            if (key === especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        //Sólo se permite letras, tildes, ñ y espacio en blanco
        if (!/[a-zäëïöüáéíóúáéíóúâêîôûàèìòù\u00f1\u00d1\s]/.test(tecla) && !tecla_especial) {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}


function solonumeros(e){
    key=e.keyCode || e.which;
    teclado= String.fromCharCode(key);

    numero="0123456789";

    especiales="8-37-38-46";//array

    teclado_especial=false;


    for(var i in especiales){

        if(key==especiales[i]){
            teclado_especial=true;               
        }
    }

    if(numero.indexOf(teclado)==-1 && !teclado_especial){

        return false;


    }
}



function ajax(){

    var dni =  document.getElementById("documento").value;

    fetch('https://dniruc.apisperu.com/api/v1/dni/'+dni+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImJvZ3VpcnJlQGdtYWlsLmNvbSJ9.oAtXJNjZbJr6In7Lou-8mN4996MRachznGrhc6qCQwc').
    then(res => res.json())
    .then(data => {
        var d = document.getElementById("dni").value= data.dni
        document.getElementById("nombres").value= data.nombres
        document.getElementById("apellidopat").value= data.apellidoPaterno
        document.getElementById("apellidomat").value= data.apellidoMaterno
        dni = "";
        console.log(d);
    })
}

    var input=  document.getElementById('documento');
    input.addEventListener('input',function(){
    if (this.value.length > 8) 
        this.value = this.value.slice(0,8); 
    })

