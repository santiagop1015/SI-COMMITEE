$(document).ready(function () {
    window.addEventListener("storage", ChangeCard);

    $('.fade').on('hidden.bs.modal', function(e) {
        // do something...
        //var ItemNow = localStorage.getItem("number");
        //ReloadsFrames(parseInt(ItemNow) + 1);
        ReloadsFrames("non-reaload");
    });
});

var Frames = ["idFrame1", "idFrame2"];

function ReloadsFrames(param) {
    var ItemNow = localStorage.getItem("number");

    //var iframe = document.getElementById(Frames[ItemNow]);
    if(!param) {
        // if (ItemNow != "15") {
             var iframe = document.getElementById(Frames[ItemNow]);
             iframe.src = iframe.src;
             if (ItemNow == "0") {
                 setTimeout(() => {
                     iframe.contentWindow.location.reload();
                     resizeIframe(document.getElementById(Frames[ItemNow]), 1);
                 }, 100);
             }
        // }
         } else if(param == "non-reaload") {
             resizeIframe(document.getElementById(Frames[ItemNow]), 1);
         }
}

// Funcion para cambiar la Carta
function ChangeCard(event) {
    var Modal = document.getElementById("idModal");
    var ModalTitle = document.getElementById("idModalTittle");
    var ModalText = document.getElementById("idModalText");

    if (event.key == "height") {
        var ItemNow = localStorage.getItem("number");

        var FrameEvaluar = document.getElementById(Frames[ItemNow]);
        //resizeIframe(FrameEvaluar, localStorage.getItem("height"));
    }

    

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
        //obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        obj.style.height = obj.contentDocument.body.clientHeight + "px";
        //console.log(document.getElementById("idFrameBuscar").contentDocument.body.clientHeight);
        //  document.body.scrollIntoView("non-reaload");
    } else {
        obj.style.height = obj.contentDocument.body.clientHeight + "px";
       /* if (px == 0) {
            //  obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        } else {
            obj.style.height = px + "px";
        }
        */
    }

}