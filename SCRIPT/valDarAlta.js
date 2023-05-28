

const matricula = document.getElementById('matricula');
const nom = document.getElementById('nombre');
const apellido1 = document.getElementById('apellido1');
const nCognom = document.getElementById('apellido2');
const correo = document.getElementById('correo');
const direccion = document.getElementById('direccion');
const DNI = document.getElementById('dni');
const telefono = document.getElementById('telefono');


const expresiones = {
    matricula: /^(\d{8})$/,
    correo: /^\d{8}@aurora\.com$/,
    nom: /^([a-zA-ZÀ-ÿñÑ]+)(\s[a-zA-ZÀ-ÿñÑ]+)?(\s[a-zA-ZÀ-ÿñÑ]+)?$/,
    apellidos: /^([a-zA-ZÀ-ÿñÑ]+)(\s[a-zA-ZÀ-ÿñÑ]+)?(\s[a-zA-ZÀ-ÿñÑ]+)?$/,
    adreça: /^[a-zA-ZÀ-ÿñÑ]+(\s[a-zA-ZÀ-ÿñÑ]+)?(\s[a-zA-ZÀ-ÿñÑ]+)?, \d+$/,
    DNI: /^(\d{7})$/,
    telefon: /^(\d{9})$/
}

const validarForm = (e) => {
    // console.log(e.target.id); -> Mostrara la id del campo que hara el evento
    switch (e.target.name){ // Hacemos un switch según la id
        case "matricula":
            validarMatricula(expresiones.matricula, e.target); //Llama a la funcion validarUser
        break;
        case "nombre":
            validarNom(expresiones.nom, e.target); //Llama a la funcion validarPass
        break;
        case "apellido1":
            validarApellido1(expresiones.apellidos, e.target); //Llama a la funcion validarUser
        break;
        case "nCognom":
            validarApellido2(expresiones.apellidos, e.target); //Llama a la funcion validarPass
        break;
        case "correo":
            validarCorreo(expresiones.matricula, e.target); //Llama a la funcion validarUser
        break;
        case "telefono":
            validarTelefono(expresiones.telefon, e.target); //Llama a la funcion validarUser
        break;
        case "direccion":
            validarAdreça(expresiones.adreça, e.target); //Llama a la funcion validarUser
        break;
        case "dni":
            validarDNI(expresiones.DNI, e.target); //Llama a la funcion validarUser
        break;
    }
};

const validarMatricula = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('matricula').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('matricula').classList.remove('nom-incorrecto');
        document.getElementById('alerta').classList.add('warning'); 
        document.getElementById('alerta').classList.remove('error');
    } else{
        document.getElementById('matricula').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('matricula').classList.add('nom-incorrecto');
        document.getElementById('alerta').classList.remove('warning'); 
        document.getElementById('alerta').classList.add('error');
    }
};
const validarNom = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('nombre').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('nombre').classList.remove('nom-incorrecto');
        document.getElementById('alerta1').classList.add('warning'); 
        document.getElementById('alerta1').classList.remove('error');
    } else{
        document.getElementById('nombre').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('nombre').classList.add('nom-incorrecto');
        document.getElementById('alerta1').classList.remove('warning'); 
        document.getElementById('alerta1').classList.add('error');
    }
};
const validarApellido1 = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('apellido1').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('apellido1').classList.remove('nom-incorrecto');
        document.getElementById('alerta2').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta2').classList.remove('error');
    } else{
        document.getElementById('apellido1').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('apellido1').classList.add('nom-incorrecto');
        document.getElementById('alerta2').classList.remove('warning');  //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta2').classList.add('error');
    }
};
const validarApellido2 = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('apellido2').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('apellido2').classList.remove('nom-incorrecto');
        document.getElementById('alerta3').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta3').classList.remove('error');
    } else{
        document.getElementById('apellido2').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('apellido2').classList.add('nom-incorrecto');
        document.getElementById('alerta3').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta3').classList.add('error');
    }
};
const validarCorreo = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('correo').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('correo').classList.remove('nom-incorrecto');
        document.getElementById('alerta6').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta6').classList.remove('error');
        if(matricula.value !== correo.value){
            document.getElementById('correo').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
            document.getElementById('correo').classList.add('nom-incorrecto');
            document.getElementById('alerta6').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
            document.getElementById('alerta6').classList.add('error');
        } else{
            document.getElementById('alerta6').classList.add('warning');
            document.getElementById('alerta6').classList.remove('error');
            document.getElementById('correo').classList.add('nom-correcto');
            document.getElementById('correo').classList.remove('nom-incorrecto');
        };
    } else{
        document.getElementById('correo').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('correo').classList.add('nom-incorrecto');
        document.getElementById('alerta6').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta6').classList.add('error');
        
    }
};
const validarAdreça = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('direccion').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('direccion').classList.remove('nom-incorrecto');
        document.getElementById('alerta4').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta4').classList.remove('error');
    } else{
        document.getElementById('direccion').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('direccion').classList.add('nom-incorrecto');
        document.getElementById('alerta4').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta4').classList.add('error');
    }
};
const validarDNI = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('dni').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('dni').classList.remove('nom-incorrecto');
        document.getElementById('alerta7').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta7').classList.remove('error');
    } else{
        document.getElementById('dni').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('dni').classList.add('nom-incorrecto');
        document.getElementById('alerta7').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta7').classList.add('error');
    }
};
const validarTelefono = (expresion, input) => {
    if(expresion.test(input.value)){
        document.getElementById('telefono').classList.add('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('telefono').classList.remove('nom-incorrecto');
        document.getElementById('alerta5').classList.add('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta5').classList.remove('error');
    } else{
        document.getElementById('telefono').classList.remove('nom-correcto'); //Nom-correcto y Nom-incorrecto son clases que se añaden para los INPUTS
        document.getElementById('telefono').classList.add('nom-incorrecto');
        document.getElementById('alerta5').classList.remove('warning'); //Warning y Error son clases que se añaden a las FRASES DE ERROR
        document.getElementById('alerta5').classList.add('error');
    }
};


// Traduciendo validarUser: Si el valor del campo 'usuario' (texto que ira poniendo el admin), no es = a admin, añadira la clase user-incorrecto puesta en el css (classList) al elemento id 'usuario'
// classList.remove es para eliminar la clase en caso de que se haya puesto mal y después bien.
//console.log es para demostrar que funcione correctamente



//Traduciendo validarPass: Lo mismo que validarUser

nom.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
nom.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);

matricula.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
matricula.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);

apellido1.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
apellido1.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);

apellido2.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
apellido2.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);
correo.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
correo.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);

DNI.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
DNI.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);


telefono.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
telefono.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);
direccion.addEventListener('keyup', validarForm
    // Realizar acciones adicionales aquí
);
direccion.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);
//'Blur': Evento que suena cuando se sale de un campo que acabamos de escribir
//'Keyup': Evento que suena cada vez que tocamos una tecla
