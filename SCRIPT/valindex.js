
const user = document.getElementById('usuario');
const pass = document.getElementById('contra');


const validarForm = (e) => {
    // console.log(e.target.id); -> Mostrara la id del campo que hara el evento
    switch (e.target.id){ // Hacemos un switch según la id
        case "usuario":
            validarUser(); //Llama a la funcion validarUser
        break;
        case "contra":
            validarPass(); //Llama a la funcion validarPass
        break;
    }
};

const validarUser = () => {
    if (user.value !== 'admin'){
        document.getElementById('usuario').classList.add('user-incorrecto');
        document.getElementById('usuario').classList.remove('user-correcto');
        document.getElementById('alerta').classList.remove('warning');
        document.getElementById('alerta').classList.add('error');
        console.log('Funciona');
        //Si es igual, le añadimos eliminamos (display none) y añadimos error (display block) => NO PUEDEN HABER 2 A LA VEZ
    } else{
        document.getElementById('usuario').classList.add('user-correcto');
        document.getElementById('usuario').classList.remove('user-incorrecto');
        document.getElementById('alerta').classList.add('warning'); 
        document.getElementById('alerta').classList.remove('error');
        console.log('Funciona2');
        //Si es igual, le añadimos warning (display none) y eliminamos error (display block) => NO PUEDEN HABER 2 A LA VEZ
    }
};

// Traduciendo validarUser: Si el valor del campo 'usuario' (texto que ira poniendo el admin), no es = a admin, añadira la clase user-incorrecto puesta en el css (classList) al elemento id 'usuario'
// classList.remove es para eliminar la clase en caso de que se haya puesto mal y después bien.
//console.log es para demostrar que funcione correctamente

const validarPass = () => {
    if (pass.value !== 'asdASD123'){
        document.getElementById('contra').classList.add('user-incorrecto');
        document.getElementById('contra').classList.remove('user-correcto');
        document.getElementById('alerta1').classList.remove('warning');
        document.getElementById('alerta1').classList.add('error');
        console.log('Funciona');
    } else{
        document.getElementById('contra').classList.add('user-correcto');
        document.getElementById('contra').classList.remove('user-incorrecto');
        document.getElementById('alerta1').classList.add('warning');
        document.getElementById('alerta1').classList.remove('error');
        console.log('Funciona2');
    }
};

//Traduciendo validarPass: Lo mismo que validarUser


user.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);


pass.addEventListener('blur', validarForm
    // Realizar acciones adicionales aquí
);

//'Blur': Evento que suena cuando se sale de un campo que acabamos de escribir
//'Keyup': Evento que suena cada vez que tocamos una tecla