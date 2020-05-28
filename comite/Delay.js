setTimeout(onRedirect, 2000);

var user = window.location.search.substring(1);
var div = document.getElementById("idDivisor");
// var span = document.getElementById("Points");

switch (user) {
    case "admin":
        div.innerHTML = "<h1>Bienvenido Administrador</h1>";
        break;
    case "director":
        div.innerHTML = "<h1>Bienvenido Director</h1>";
        break;
    case "jurado":
        div.innerHTML = "<h1>Bienvenido Asistente/Secretari@</h1>";
        break;
    case "dinvestigar":
        div.innerHTML = "<h1>Bienvenido Director de Investigación</h1>";
        break;
    case "coordinador":
        div.innerHTML = "<h1>Bienvenido Coordinador</h1>";
        break;
    case "estudiante":
        div.innerHTML = "<h1>Bienvenido Estudiante</h1>";
        break;
    case "incorrecta":
        div.innerHTML = "<h1>Contraseña Incorrecta</h1>";
        break;
    case "noex":
        div.innerHTML = "<h1>El Usuario no existe</h1>";
        console.log("El Usuario no existe dentro del sistema");
        break;
    default:
        onIncorrect();
}

function onRedirect() {
    switch (user) {
        case "admin":
            console.log("Administrador");
            location.href = 'administrador/administrador.php';
            break;
        case "director":
            console.log("Director");
            location.href = 'directores/director.php';
            break;
        case "jurado":
            console.log("Jurado");
            location.href = 'secretarias/secretaria.php';
            break;
        case "dinvestigar":
            console.log("Jurado");
            location.href = 'Dinvestigar/dinvestigar.php';
            break;
        case "coordinador":
            console.log("Coordinador");
            location.href = 'coordinadores/Coordinador.php';
            break;
        case "estudiante":
            console.log("Estudiante");
            location.href = 'estudiantes/estudiante.php';
            break;
        case "incorrecta":
            console.log("Contraseña Incorrecta");
            onIncorrect();

            break;
        case "noex":
            console.log("El Usuario no existe dentro del sistema");
            onIncorrect();

            break;

        default:
            onIncorrect();
    }


}

function onIncorrect() {
    location.href = 'Login/index.html';
}