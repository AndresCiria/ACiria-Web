/* Rodrigo Barba - Shinia */
// Arreglo de productos en el cart
const cart = [];

document.addEventListener("DOMContentLoaded", function () {
  // Productos en el catálogo.
  const productList = [
    {
      id: 1,
      image: "images/Logos/Sudadera.PNG",
      name: "Sudadera",
      description: "Sudadera negra con mi logo.",
      price: 40.00,
    },
    {
		  id: 2,
	  	image: "images/Logos/Pantalon.PNG",
		  name: "Pantalón",
		  description: "Pantalón negro con mi logo.",
		  price: 45.00,
	  },
    {
      id: 3,
      image: "images/Logos/Camiseta.PNG",
      name: "Camiseta",
      description: "Camiseta negra con mi logo.",
      price: 15.00,
    },
    {
      id: 4,
      image: "images/Logos/Mochila.PNG",
	    name: "Mochila",
      description: "Mochila con mi logo",
      price: 20.00,
    },
    {
	    id: 5,
	    image: "images/Logos/Rinonera.PNG",
	    name: "Riñonera",
	    description: "Riñonera ajustable con mi logo",
	    price: 15.00,
	  },
	  {
	    id: 6,
	    image: "images/Logos/Gorro.PNG",
	    name: "Gorro",
	    description: "Gorro de pescador con mi logo",
	    price: 15.00,
	  },
  ];

  // Obtiene el contenedor donde se mostrará el catálogo y el resumen de compra.
  const productListContainer = document.getElementById("productList");
  const checkoutCartContainer = document.getElementById("checkoutCart");
  const totalCheckout = document.getElementById("totalCheckout");

  function shouldDisplaySizeSelection(productId) {
    // Array de IDs de producto para los cuales se muestra la selección de talla
    var allowedProductIds = [1, 2, 3]; // Aquí debes poner los IDs de producto deseados
    
    // Verificar si el ID del producto está en el array de IDs permitidos
    return allowedProductIds.includes(productId);
  }

  // Genera las tarjetas de productos en el catálogo y las agrega al contenedor.
  productList.forEach((product) => {
    const card = document.createElement("div");
    card.classList.add("col-md-4", "mb-4");
    card.innerHTML = `
            <div class="card card-custom neo-md rounded-md">
                <img src="${product.image}" class="card-img-top card-img-custom" alt="Producto ${product.id}">
                <div class="card-body">
                    <h4 class="card-title">${product.name}</h4>
                    <h6 class="card-text">${product.description}</h6>
                    <h7 class="card-text">Precio: ${product.price}€</h7>
                    <!-- Condición para mostrar el bloque de selección de talla -->
                    <div class="input-group" id="sizeSelect${product.id}" style="display: ${shouldDisplaySizeSelection(product.id) ? 'block' : 'none'};">
                        <label class="my-custom-label">Talla:</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-light text-dark">
                                <input type="radio" name="sizeOption${product.id}" value="S"> S
                            </label>
                            <label class="btn btn-light text-dark">
                                <input type="radio" name="sizeOption${product.id}" value="M"> M
                            </label>
                            <label class="btn btn-light text-dark">
                                <input type="radio" name="sizeOption${product.id}" value="L"> L
                            </label>
                            <label class="btn btn-light text-dark">
                                <input type="radio" name="sizeOption${product.id}" value="XL"> XL
                            </label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="inputQuantity${product.id}">-</button>
                        </span>
                        <input type="text" id="inputQuantity${product.id}" class="form-control input-number" value="1" min="1" max="10">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="inputQuantity${product.id}">+</button>
                        </span>
                    </div>
                    <button class="btn btn-primary add-to-cart" data-product-id="${product.id}" style="margin-top: 20px">Agregar al carro</button>
                </div>
            </div>
        `;
    productListContainer.appendChild(card);

    // Obtiene la cantidad de productos a agregar al cart y manda llamar la función para agregar el producto al cart.
    const btnAdd = card.querySelector(".add-to-cart");
    btnAdd.addEventListener("click", function () {
      const quantity = parseInt(
        document.getElementById(`inputQuantity${product.id}`).value
      );

      if (quantity > 0) {
        addProduct(product, quantity);
      }
    });
  });

  // Almacena en el arreglo los productos agregados al cart y actualiza la cantidad de productos en el carrito en caso de que se agregue más de uno del mismo producto.
  function addProduct(product, quantity) {
    let size;
    const productId = product.id;

    // Verificar si se muestra la selección de talla para este producto
    if (shouldDisplaySizeSelection(productId)) {
        const sizeInputs = document.getElementsByName(`sizeOption${productId}`);
        for (const input of sizeInputs) {
            if (input.checked) {
                size = input.value;
                break;
            }
        }
    } else {
        size = "";
    }

    const cartProduct = cart.find((item) => item.product.id === product.id && item.size === size);

    if (cartProduct) {
      cartProduct.quantity += quantity;
    } else {
      cart.push({ product, size, quantity });
    }

    updateCheckoutCart();
  }

  // Eventos para incrementar y decrementar la cantidad de productos en el cart.
  const btnNumberButtons = document.querySelectorAll(".btn-number");
  btnNumberButtons.forEach(function (button) {
    button.addEventListener("click", function (e) {
      e.preventDefault();

      const fieldName = this.getAttribute("data-field");
      const type = this.getAttribute("data-type");
      const input = document.getElementById(fieldName);
      const currentVal = parseInt(input.value);

      if (!isNaN(currentVal)) {
        if (type === "minus") {
          if (currentVal > input.min) {
            input.value = currentVal - 1;
          }
        } else if (type === "plus") {
          if (currentVal < input.max) {
            input.value = currentVal + 1;
          }
        }
      }
    });
  });

  // Elimina un producto del carrito cuando se presiona el botón de eliminar.
  const checkoutCart = document.getElementById("checkoutCart");
  checkoutCart.addEventListener("click", function (e) {
    if (e.target.classList.contains("btnDelete")) {
      const id = e.target.parentElement.parentElement.firstElementChild
        .textContent;
      const index = cart.findIndex((item) => item.product.id === id);

      cart.splice(index, 1);
      updateCheckoutCart();
    }
  });

  // Actualiza el resumen de compra en el carrito cuando se agrega un producto o se cambia la cantidad de productos.
  function updateCheckoutCart() {
    checkoutCart.innerHTML = "";
    let subtotal = 0;

    cart.forEach((item) => {
      const row = document.createElement("tr");
      row.innerHTML = `
                <td>Producto ${item.product.id}</td>
                <td>${item.product.name}</td>
                <td>${item.size}</td>
                <td>${item.quantity}</td>
                <td>${item.product.price}€</td>
                <td>${item.product.price * item.quantity}€</td>
                <td><button type="button" class="btn btn-danger btnDelete">Eliminar</button></td>
            `;
      checkoutCart.appendChild(row);

      subtotal += item.product.price * item.quantity;
    });

    totalCheckout.textContent = `${subtotal.toFixed(2)}€`;
  }
});

// Botón para comprar productos y mandarlos al recibo.
const btnBuy = document.querySelector(".btn-comprar");
btnBuy.addEventListener("click", function () {
  if (cart.length > 0) {
    localStorage.removeItem("data-cart");

    const cartProducts = JSON.stringify(cart);
    localStorage.setItem("data-cart", cartProducts);

    window.location.href = "checkoutForm.html";
  } else {
    alert("El cart está vacío.");
  }
});

function openPopup() {
  // URL de la página que quieres cargar en la ventana emergente
  var url = "gdpr.html";
  
  // Ancho y altura de la ventana emergente
  var width = 600;
  var height = 400;

  // Calcula la posición x e y para centrar la ventana emergente en la pantalla
  var left = (window.innerWidth - width) / 2;
  var top = (window.innerHeight - height) / 2;

  // Abre la ventana emergente con las dimensiones y posición especificadas
  window.open(url, "_blank", "width=" + width + ", height=" + height + ", top=" + top + ", left=" + left);
}
