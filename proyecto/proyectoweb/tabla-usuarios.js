fetch(BASE_URL + "proyectoweb/api/usrvista")
  .then((res) => {
    return res.json();
  })
  .then((data) => {
    let contenedor = document.getElementById("contenedorDatos");
    contenedor.innerHTML = "";
    data.forEach((dato) => {
      console.log(dato);
      let row = document.createElement("tr");
      row.innerHTML = `
              <td>${dato.id}</td>
              <td>${dato.user}</td>
              <td>${dato.nombre}</td>
              <td>${dato.apellido}</td>
              <td>
              <button class="editar">Editar</button>
              <button class="eliminar">Eliminar</button>
              </td>
        `;
      row.querySelector(".editar").onclick = function () {};
      row.querySelector(".eliminar").onclick = function () {
        eliminarUsuario(dato.id);
      };
      contenedor.append(row);
    });
  })
  .catch((error) => console.error(error));

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
function eliminarUsuario(id) {
  let confirmar = confirm("¿Desea eliminar estos datos?");
  if (confirmar == true) {
    fetch(BASE_URL + "proyectoweb/api/usreliminar/" + id, {
      method: "DELETE",
      // body: JSON.stringify({ id: id }),
    })
      .then((response) => response.json())
      .then((info) => {
        alert(info.msg);
        // changedata(0)
        if (info.data == "done") {
          location.reload();
        }
      })
      .catch((err) => console.log("Solicitud fallida", err));
  } else if (confirmar == false) {
    console.log("operación cancelada");
  }
}

// setTimeout(function () {
//   document.querySelectorAll(".eliminar").forEach((btneliminar) => {
//     console.log(btneliminar.parentElement.parentElement);
//     // btneliminar.addEventListener("click", function () {
//     //   console.log("eliminar");
//     // });
//   });

//   document.querySelectorAll(".editar").forEach((btneditar) => {
//     btneditar.addEventListener("click", function () {
//       console.log("editar");
//     });
//   });

// }, 30);

function buscar() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscador");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
