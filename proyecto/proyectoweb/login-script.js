function changedata(parameter) {
  if (parameter == 0) {
    document.getElementById("inicio-sesion").classList.toggle("active");
    document.getElementById("registrar").classList.toggle("active");
  }
};


let btn = document.getElementById("btnRegistrar");
btn.onclick = function () {
  registrar();
};

function registrar() {
  fetch(BASE_URL + "proyectoweb/api/usrnuevo", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user: document.getElementById("usuario").value,
      pass: document.getElementById("pass").value,
      nombre: document.getElementById("nombre").value,
      apellido: document.getElementById("apellido").value,
    }),
  })
    .then((response) => response.json())
    .then((info) => {
      alert(info.msg);
      // changedata(0)
      if (info.data == 'done') {
        location.reload();
      }
    })
    .catch((err) => console.log("Solicitud fallida", err));
};
// method="post" action="./api/api.php?url=usrnuevo"













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
