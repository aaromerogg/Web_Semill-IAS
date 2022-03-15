const app = new Vue({
    el:'#app',
    data:{
        pass:'',
        passC:'',
        respuesta:'',
        correo:'',
        boton:'btn disabled',
        menu:false
    },
    methods:{
        registro(){
            if (this.pass == this.passC) {
                const form = document.getElementById('formRegistro')
                axios.post('api/loginRegistro/registro.php', new FormData(form))
                .then( res =>{
                    
                    this.respuesta = res.data
                    this.direccionamiento()
                   
                })
                
               
            } else {
                swal('los password no son iguales')
            }
           
        },
        direccionamiento(){
            if (this.respuesta == 'success') {
                Swal.fire({title:"Hecho!", text: "Registro Almacenado correctamente espera a que el administrador se comunique.", icon: "success",confirmButtonColor: "rgb(26, 35, 126)"})
                .then((value) => {
                    location.href = 'index.php';
                })
                
            } else {
                swal('No se pudo registrar','error')
            }
        },
        validarCorreo(){
            if (this.validEmail(this.correo)) {
                const formData = new FormData()
                formData.append('correo',this.correo)
                axios.post('api/loginRegistro/validarEmail.php', formData)
                .then( res =>{
                    this.respuesta = res.data
                    if (res.data == "success") {
                        this.boton = 'btn'
                    } else {
                        swal('El correo electronico ya existe')
                    }
                })
            } else {
                swal('Escribe el correo de forma correcta')
            }
        },
        validarCorreo2(){
            if (this.validEmail(this.correo)) {
                const formData = new FormData()
                formData.append('correo',this.correo)
                //axios.post('api/loginRegistro/validarEmail.php', formData)
            } else {
                swal('Escribe el correo de forma correcta')
            }
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        login(){
            const form = document.getElementById('inicioSesion')
            axios.post('api/loginRegistro/login.php', new FormData(form))
            .then( res =>{
                
            this.respuesta = res.data
            if (res.data == 'success') {

                Swal.fire({title:"Bienvenido!", text: "El menu ha sido Habilitado !", icon: "success",confirmButtonColor: "rgb(26, 35, 126)"})
                    .then((value) => {
                        location.href = './principal';
                    })

                //document.getElementById('salir').style.display="block" ;
                document.getElementById('iniciarSesion').style.display="none" ;

            } else if (res.data == 'fail'){
                Swal.fire({title:"Error", text: "Usuario y/o contraseña incorrectos!.", icon: "error",confirmButtonColor: "rgb(26, 35, 126)"})
            } else if (res.data == 'non'){
                Swal.fire({title:"El usuario no existe!", text:"Registrese y vuelva a intentarlo", icon:"error",confirmButtonColor: "rgb(26, 35, 126)"})
            }
            else {
                Swal.fire({title:"No está Habilitado!", text: "Comuníquese con su administrador y solicite su habilitación en el sistema - Correo: " + res.data, icon: "error",confirmButtonColor: "rgb(26, 35, 126)"})
            }
                
            })
        },
        recuperarPassword(){
            const form = document.getElementById('recuperar')
            axios.post('api/loginRegistro/recuperarPass.php', new FormData(form))
            .then( res =>{
                
            this.respuesta = res.data
            if (res.data == 'success') {

                Swal.fire({title:"Hecho!", text: "Se ha enviado un correo electrónico con las instrucciones para el cambio de su contraseña. Por favor verifique la información enviada.", icon: "success",confirmButtonColor: "rgb(26, 35, 126)"})
                    .then((value) => {
                        location.href = 'index.php';
                    })
                document.getElementById('iniciarSesion').style.display="none" ;
            }
            else if (res.data == 'Message could not be sent'){
                Swal.fire({title:"Error!", text: "No fue posible completar la solicitud. Intentelo de nuevo.", icon: "error",confirmButtonColor: "rgb(26, 35, 126)"})
            }
            else {
                Swal.fire({title:"Error!", text: "El correo electrónico no se encuentra registrado en el sistema", icon: "error",confirmButtonColor: "rgb(26, 35, 126)"})
            }
                
            })
        },
        contactarAdmin(){
            const form = document.getElementById('formContacto')
            axios.post('../api/loginRegistro/contactoAdmin.php', new FormData(form))
            .then( res =>{
                
            this.respuesta = res.data
            console.log(res.data)
            if (res.data == 'success') {
                swal("Hecho!","Solicitud generada exitosamente. Por favor espere a que el administrador se comunique.", "success")
            }
            else if (res.data == 'Message could not be sent'){
                swal("Error!", "No fue posible completar la solicitud. Intentelo de nuevo.", "error")
            }
            else {
                swal("Error!", "No fue posible completar la solicitud. Intentelo de nuevo.", "error")
            }
                
            })
        }

    }
})

