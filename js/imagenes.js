Vue.component("mi-componente", {
  template: `
    <div class="card">
              <div class="card-image">
                  <img src="../img/urosario.png">
                <span class="card-title"></span>
                <a class="btn-floating pulse halfway-fab waves-effect waves-light red" ><i class="material-icons">cloud_queue</i></a>
              </div>
              <div class="card-content">
                <p ALIGN="justify">Una opción simple y efectiva es lo que buscan los clientes y en general las personas interesadas en utilizar una aplicación de Internet de las cosas (IoT). De esta forma, las soluciones verticales basadas en capacidades horizontales que resuelvan necesidades especificas en el sector industrial.
                </p>
              </div>
              <br>
              <br>
              </div>   
    `,
});
const apps = new Vue({
  el: "#apps",
  data: {
    mensaje: "Hola Vue!",
    imagen: "../img/urosario.png",
  },
});
