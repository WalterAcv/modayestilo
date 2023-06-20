fetch("http://localhost/proyectoweb/api/vista")
  .then((res) => {
    return res.json();
  })
  .then((data) => {
    let contenedor = document.getElementById("contenedorDatos");
    contenedor.innerHTML = ""
    data.forEach((dato) => {
      console.log(dato);
      let cards = document.createElement("div");
      cards.classList.add('card-container')

      cards.innerHTML = `
              <img src="img/productos/${dato.imagen}">
              <h1>${dato.nombre}</h1>
              <p>${dato.descripcion}</p>
              <div class="button-wrapper">
                  <button id="preciobtn" class="btn outline">S/.${dato.precio}</button>
                  <button class="btn fill">Añadir al Carrito</button>
              </div>
        `;
      contenedor.append(cards);

    });
  })
  .catch((error) => console.error(error));

  document.getElementById("preciobtn").disabled = true;


let sections = document.querySelectorAll("section");
let navLinks = document.querySelectorAll("header nav a");

window.onscroll = () => {
  sections.forEach((sec) => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 150;
    let height = sec.offsetHeight;
    let id = sec.getAttribute("id");

    if (top >= offset && top < offset + height) {
      navLinks.forEach((links) => {
        links.classList.remove("active");
        document
          .querySelector("header nav a[href*=" + id + "]")
          .classList.add("active");
      });
    }
  });
};
