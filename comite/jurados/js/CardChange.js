$(document).ready(function () {
    window.addEventListener("storage", ChangeCard);
});

var Frames = ["idFrame1", "idFrame2", "idFrame3"];

function ReloadsFrames() {
    var ItemNow = localStorage.getItem("number");

    var iframe = document.getElementById(Frames[ItemNow]);
    iframe.src = iframe.src;
}

// Funcion para cambiar la Carta
function ChangeCard(event) {

    if (event.key == "height") {
        var ItemNow = localStorage.getItem("number");

        var FrameEvaluar = document.getElementById(Frames[ItemNow]);
        resizeIframe(FrameEvaluar, localStorage.getItem("height"));
    }

    var Modal = document.getElementById("idModal");
    var ModalTitle = document.getElementById("idModalTittle");
    var ModalText = document.getElementById("idModalText");

    if (event.key == "Mensaje") {
        var Item = localStorage.getItem("Mensaje");
        if (Item !== null) {
            switch (Item) {
                case "0":
                    document.getElementById("idButtonModal").click();
                    Modal.className = "modal-content bg-danger";
                    ModalTitle.innerHTML = "Error - " + localStorage.getItem("Mensaje-Title");
                    ModalText.innerHTML = localStorage.getItem("Mensaje-Message");
                    break;
                case "1":
                    document.getElementById("idButtonModal").click();
                    Modal.className = "modal-content bg-success";
                    ModalTitle.innerHTML = "Exito - " + localStorage.getItem("Mensaje-Title");
                    ModalText.innerHTML = localStorage.getItem("Mensaje-Message");
                    break;
                default:
                    break;
            }
        }
    }
}

// Ajustasr Tamaño del Frame
function resizeIframe(obj, px) {

    if (!px) {
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
    } else {
        if (px == 0) {
            //obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        } else {
            obj.style.height = px + "px";
        }
    }

}