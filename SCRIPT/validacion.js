const pass = document.getElementById("contra");
const user = document.getElementById("usuario");



user.addEventListener("blur", e => {
    let warning = '';
    let entrar = true;
    if (user.value.length === 0) {
        warning += `Introduce un nombre de usuario`
        entrar = true
    }
    if (user.value.length > 25) {
        warning += `El nombre es demasiado largo`
        entrar = true
    }
    if (entrar) {
        alerta.innerHTML = warning
        alerta.style.color = "red"
        user.style.borderColor = "red"
    }

});

pass.addEventListener("blur", e => {
    let warning1 = '';
    let entrar = true;
    if (pass.value.length === 0) {
        warning1 += `Introduce la contraseña`
        entrar = true
    }
    if (entrar) {
        alerta1.innerHTML = warning1
        alerta1.style.color = "red"
        pass.style.borderColor = "red"
    }
})
formMasc.addEventListener("submit", e => {
    let warning = '';
    let warning1 = '';

    let entrar = true;

    if (nom.value.length === 0) {
        warning += `El nombre es demasiado corto <br>`
        entrar = true
    }
    if (nom.value.length > 25) {
        warning += `El nombre es demasiado largo<br>`
        entrar = true
    }
    if (his.value.length === 0) {
        warning1 += `No es un historial adecuado`
        entrar = true
    }
    if (entrar) {
        alerta.innerHTML = warning
        alerta.style.color = "red"
        nom.style.borderColor = "red"
        alerta1.innerHTML = warning1
        alerta1.style.color = "red"
        his.style.borderColor = "red"
    }
})