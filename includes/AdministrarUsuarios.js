
if (window.acceso == "No"){
    Swal.fire({title:"Error", text: "No se encuentra autorizado para realizar esta acción", icon: "error",confirmButtonColor: "#616161"})
      .then((result) => {
          window.location.href = "index.php";
      })
  }
  else{
      $(document).ready(function() {
      
          $('#example').DataTable( {
              language: {
              search: "Buscar en La Tabla",
              lengthMenu:    "Hojas por pagina _MENU_Elementos",
              info:           "Elemento _START_ a _END_ -Total _TOTAL_ Elementos",
                  paginate: {
                      first:      "Primero",
                      previous:   "Anterior",
                      next:       "Siguiente",
                      last:       "Ultimo"
                  }
              
              }
          } );
      
      
      function actualizarEstado(id,accion){
        $.ajax({
          url: "actualizar_datos.php", method: "POST",
          data:{id: id,accion:accion, b:1},
          success: function(data){
              if (data == "0Se han actualizado los datos"){
                  Swal.fire({title:"Hecho!", text: "El usuario ha sido deshabilitado", icon: "success",confirmButtonColor: "#616161"})
                      .then((result) => {
                          if (result.isConfirmed) {
                              window.location.reload()
                          }
                      })
              }
              else if (data == "1Se han actualizado los datos"){
                  Swal.fire({title:"Hecho!", text: "El usuario ha sido habilitado", icon: "success",confirmButtonColor: "#616161"})
                      .then((result) => {
                          if (result.isConfirmed) {
                              window.location.reload()
                          }
                      })
              }
            
          }
        })
      }
      
      
      $(document).on("click",'#habilitar',function(){
          var id = $(this).data("idh");
          var accion = 1
          actualizarEstado(id,accion);
      })
      
      $(document).on("click",'#deshabilitar',function(){
          var id = $(this).data("idh");
          var accion = 0
          actualizarEstado(id,accion);
      })
      
      });
  }
  