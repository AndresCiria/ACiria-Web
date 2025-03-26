document.addEventListener("DOMContentLoaded", function () {

  // Recupera los datos del carrito desde el almacenamiento local y además obtiene los elementos del DOM que se van a actualizar.
  const dataCart = localStorage.getItem("data-cart");
  const listGroup = document.querySelector(".list-group");
  const footerLeft = document.getElementById("footer-left");
  const footerRight = document.getElementById("footer-right");

  // Si existen los datos del carrito y el elemento del DOM, entonces se recorren los productos y se agregan al listado.
  if (dataCart && listGroup) {
      const cart = JSON.parse(dataCart);

      // Recorre los productos del carrito y los agrega al listado
      cart.forEach((item) => {
          const listItem = document.createElement("a");
          listItem.setAttribute("href", "#");
          listItem.classList.add("list-group-item", "list-group-item-action");

          const itemContent = `
            <div class="d-flex w-100 justify-content-between">
            <h4 class="mb-1">Producto ${item.product.id}</h4>
            <h4 class="mb-1">${item.product.name}</h4>
            <h4>Precio: ${item.product.price}€</h4>
            </div>
            <p class="mb-1">Cantidad: ${item.quantity}</p>
            <h4>Precio total: ${item.product.price * item.quantity}€</h4>
          `;

          listItem.innerHTML = itemContent;
          listGroup.appendChild(listItem);
      });

      // Calcula el total de productos y el total a pagar.
      let total = 0;
      cart.forEach((item) => {
          total += item.product.price * item.quantity;
      });

      // Obtiene la fecha actual y la formatea.
      const date = new Date();
      const todayDate = `${date.getDate()}/${date.getMonth() + 1 }/${date.getFullYear()}`;

      // Muestra la fecha y el total en el footer del recibo.
      footerLeft.innerHTML = `<p>Fecha: ${todayDate}</p>`;
      footerRight.innerHTML = `<p><i class="fa-solid fa-money-bill" style="padding-right: 10px"></i>Total: ${total.toFixed(2)}€ </p>`;
  }

  window.onload = function() {
      // Obtener el contenido HTML de la página
      var contenidoHTML = document.documentElement.outerHTML;
        
      // Crear objeto JSON con el contenido HTML
      var datos = {
        "html": contenidoHTML
      };

      // Convertir el objeto JSON a una cadena
      var datosJSON = JSON.stringify(datos);

      // Llamar a la función para enviar los datos al servidor
      enviarJSON(datosJSON);
    }
    
    // Función para enviar los datos JSON al servidor
    function enviarJSON(datosJSON) {
      // Crear una nueva solicitud HTTP
      var xhttp = new XMLHttpRequest();

      // Definir la URL del servidor
      var url = "../saveReceipt.php";
      
      // Configurar la solicitud HTTP
      xhttp.open("POST", url, true);
      
      // Configurar el encabezado de la solicitud para enviar datos JSON
      xhttp.setRequestHeader("Content-Type", "application/json");
      
      // Definir la función a ejecutar cuando se complete la solicitud
      xhttp.onreadystatechange = function() {
      
        if (this.readyState == 4 && this.status == 200) {
      
          // Mostrar la respuesta del servidor
          console.log(this.responseText);
        }
      };
      
      // Enviar los datos JSON al servidor
      xhttp.send(datosJSON);
    }
    
    // Evento para llamar a la función crearJSON cuando se haga clic en el botón
    document.getElementById('save').addEventListener('click', crearJSON);
  });

  // Función para verificar si se aceptaron los términos antes de continuar
  function verificarTerminos(event) {
    // Verificar si la casilla de verificación está marcada
    if (!document.getElementById("terminos").checked) {
        // Mostrar mensaje de error si los términos no están aceptados
        alert("Por favor, acepta los términos y condiciones para continuar.");
        event.preventDefault(); // Detener la carga del enlace
    }
  }

  // Asignar la función verificarTerminos al evento click del enlace de aceptar compra
  document.getElementById("save").addEventListener("click", verificarTerminos);