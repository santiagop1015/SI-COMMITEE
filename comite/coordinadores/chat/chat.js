$(document).ready(function () {
  fetch_user();

  // document.querySelector(".direct-chat-text:after").setAttribute("border-left-color", "#B42A2A");
  // border-left-color: #B42A2A;

  setInterval(() => {
    fetch_user();
  }, 4000);

  function fetch_user() {
    $.ajax({
      url: "chat/fetch_user.php",
      method: "POST",
      success: function (data) {
        $("#idContactsList").html(data);

        //console.log(data);
      },
    });
  }

  $("#idFormSearchUser").on("submit", function (e) {
    e.preventDefault();

    function search_user() {
      var name_user = $("#idNombreUsuario").val();

      $.ajax({
        url: "chat/search_user.php",
        method: "POST",
        data: {
          name_user: name_user,
        },
        success: function (data) {
          $("#idContactsSearch").html(data);
          console.log(data);
        },
      });
    }
    search_user();
  });
});

$(document).on("click", ".idItemSearch", function () {
  var to_user_id = $(this).data("touserid");
  var to_user_name = $(this).data("tousername");
  var name_to_chat = document.getElementById("idNameChat");
  name_to_chat.innerHTML = to_user_name;

  var ButtonSend = document.getElementsByClassName("send_chat")[0];
  ButtonSend.setAttribute("id", to_user_id);

  var ContainerMessages = document.getElementsByClassName(
    "ContainerMessages"
  )[0];
  ContainerMessages.setAttribute("id", "idContainerMessages" + to_user_id);

  // Aparecer formulario de chat cuando seleccione un usuario
  setTimeout(() => {
    document.getElementById("idFormChat").style.display = "Block";
  }, 500);

  setTimeout(() => {
    document.getElementById("idCardNameChat").style.display = "Block";
  }, 500);
  setTimeout(() => {
    onHistoryChat(to_user_id);
  }, 110);


  setInterval(() => {
    onHistoryChat(to_user_id);
  }, 5000);


  var Card = $("#idCard");
  if (Card[0].className !== "card direct-chat direct-chat-primary") {
    document.getElementById("idButtonMessages").click();
  }
  document.getElementById("idButtonCloseModal").click();

  document.getElementById("idMessage_Content").focus();
});

function onHistoryChat(to_user_id) {
  $.ajax({
    url: "chat/fetch_user_chat_history.php",
    method: "POST",
    data: {
      to_user_id: to_user_id,
    },
    success: function (data) {
      // idContainerMessages
      // console.log(data);
      $("#idContainerMessages" + to_user_id).html(data);
      //   $('.ContainerMessages').html(data);
      //   var ContainerMessages = document.getElementsByClassName("ContainerMessages")[0];
      var altura = $("#idContainerFather").prop("scrollHeight");
      $("#idContainerFather").scrollTop(altura);
    },
  });
}

$(document).on("click", ".idItem", function () {
  // clearInterval(update);
  var to_user_id = $(this).data("touserid");
  var to_user_name = $(this).data("tousername");

  var name_to_chat = document.getElementById("idNameChat");
  name_to_chat.innerHTML = to_user_name;

  var ButtonSend = document.getElementsByClassName("send_chat")[0];
  ButtonSend.setAttribute("id", to_user_id);

  var ContainerMessages = document.getElementsByClassName(
    "ContainerMessages"
  )[0];
  ContainerMessages.setAttribute("id", "idContainerMessages" + to_user_id);

  document.getElementById("idFormChat").style.display = "Block";
  setTimeout(() => {
    document.getElementById("idCardNameChat").style.display = "Block";
  }, 100);

  setTimeout(() => {
    onHistoryChat(to_user_id);
  }, 110);
  //
  //var ButtonMessages = document.getElementById("idButtonMessages");
  //ButtonMessages.style.display = "Block";
  //
  setInterval(() => {
    onHistoryChat(to_user_id);
  }, 5000);
});

//$(document).on('click', '.send_chat', function() {
$("#idFormSendMessage").on("submit", function (e) {
  e.preventDefault();
  //   var to_user_id = $(this).attr('id');
  var to_user_id = $(".send_chat").attr("id");
  //console.log(to_user_id);
  var chat_message = $("#idMessage_Content").val();

  if (chat_message == "") {
    alert("Vacio");
  } else {
    $("#idMessage_Content").val("");
    $.ajax({
      url: "chat/insert_chat.php",
      method: "POST",
      data: {
        to_user_id: to_user_id,
        chat_message: chat_message,
      },
      success: function (data) {
        // idContainerMessages
        // console.log(data);
        $("#idContainerMessages").html(data);
        var altura = $("#idContainerFather").prop("scrollHeight");
        $("#idContainerFather").scrollTop(altura);
        onHistoryChat(to_user_id);
      },
    });
  }
});

$(document).on("click", "#idButtonMessages", function () {
  var Card = $("#idCard");
  //control-sidebar control-sidebar-dark position-fixed
  if (Card[0].className == "card direct-chat direct-chat-primary") {
    var TitleChat = $("#idNameChat")[0].innerHTML.trim();
    if (TitleChat !== "Seleccione un Chat") {
      // Aparecer form de chat despues de 0.5 seg
      setTimeout(() => {
        document.getElementById("idFormChat").style.display = "Block";
      }, 500);
    }
    setTimeout(() => {
      document.getElementById("idCardNameChat").style.display = "Block";
    }, 450);
  } else {
    //ocultar el formulario del chat
    //setTimeout(() => {
      document.getElementById("idFormChat").style.display = "None";
    //}, 100);
    setTimeout(() => {
      document.getElementById("idFormChat").style.display = "None";
    }, 500);
    //setTimeout(() => {
      document.getElementById("idCardNameChat").style.display = "None";
    //}, 100);
    setTimeout(() => {
      document.getElementById("idCardNameChat").style.display = "None";
    }, 450);
  }
});
