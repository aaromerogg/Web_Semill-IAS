<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // $foto = $_SESSION['foto'];
    $usuario = $_SESSION['user'];
    $email = $_SESSION['username'];

//   echo("<script>var foto = " . json_encode($foto) . ";var usuario = " . json_encode($usuario) . ";var email = " . json_encode($email) . ";");
//   echo "console.log(foto,usuario,email);";
//   echo "</script>";
  

} else {
 header('location:../index.php');
 exit;
}
include '../api/conexion.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Semill-IAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <script src="../js/sweetalert2.all.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <?php include '../includes/metadatos.html';?>
  </head>

<?php include '../includes/header2.php';?>

<body onload="M.AutoInit()">
<br>
    <div class="row" style="margin-bottom: 0px;">
        <div class="col l1 m1"></div>

        <div class="col l2 m2 center" style="padding-top: 10px;">
            <br><br>
                <div class="row" style="border-style: solid;border-color:gray;">
                <!-- <border-radius: 15px;"> -->
                
                <div class="row">
                    <br><label style="color:black"><b>ACTAS</b></label>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>
                <div class="row">
                    <button class="btn"  id= "Btn1" onclick="Consultar()" style="color:BLUE;background:#FFFFFF">23/03/2022</button>
                </div>

                <ul class="pagination">
                    <!-- <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li> -->
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>

            </div>
        </div>
        
        <div class="col l1 m1">
            <!-- Separación -->
        </div>
        <div class="col l7 m7">
            <div class="row right">
                <a href="NuevaActa.php"><button class="btn">Nueva Acta</button></a> 
            </div>
            <div class="row">
                <br><br>
                <div class="container" style="zoom:80%;width:100%;border-style: solid;border-color:gray;display:block;height:558px;overflow:auto;padding-left: 20px;padding-right: 20px;">
                    <!-- Inicio -->
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col m4 l4 s4" style="background-color:#bbdefb;border-style: solid;border-color:gray;border-width: 1px;border-right-style:none">
                            <span>SEMILLERO</span>
                        </div>
                        <div class="col m4 l4 s4" style="border-style: solid;border-color:gray;border-width: 1px;">
                            <span>FORMATO</span>
                        </div>
                        <div class="col m4 l4 s4" style="background-color:#bbdefb;border-style: solid;border-color:gray;border-width: 1px;border-left-style:none">
                            <span>MACROPROCESO</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m4 s4 l4" style="border-style: solid;border-color:gray;border-width: 1px;border-right-style:none;height: 100px;padding-left: 0px;border-top-style:none">
                            <br><img src="../img/logo_semillias.svg" style="width: 230px;height: 60px; margin: 0px 0px 0px 5px">
                        </div>
                        <div class="col m4 s4 l4" style="border-style: solid;border-color:gray;border-width: 1px;height: 100px;border-top-style:none">
                            <br><br><span>ACTA REUNIÓN</span>
                        </div>
                        <div class="col m4 s4 l4" style="height: 25px;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;border-left-style:none">
                            <div class="row center" style="margin-bottom: 4px;">
                                <span>Organización Semillero</span>
                            </div>
                            <div class="row center" style="margin-bottom: 0px;">
                                <div class="col m6 s6 l6" style="background-color:#bbdefb;height: 25px;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;border-left-style:none">
                                    <span>ACTA</span>
                                </div>
                                <div class="col m6 s6 l6" style="background-color:#bbdefb;height: 25px;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;border-left-style:none">
                                    <span>PERIODO</span>
                                </div>
                            </div>
                            <div class= "row center">
                                <div class="col m6 s6 l6" style="height: 50px;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;border-left-style:none">
                                    <input type="text" id="NumActa" name="NumActa" required minlength="1" maxlength="3" size="3" placeholder="XX" style="text-align: center" class="soloNumeros">
                                </div>
                                <div class="col m6 s6 l6" style="height: 50px;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;border-left-style:none">
                                    <input type="text" id="Periodo" name="Periodo" required minlength="6" maxlength="6" size="6" placeholder="20AA-P" style="text-align: center" class="soloNumeros">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row" style="margin-bottom: 0;border-style: solid;border-color:gray;border-width: 1px;">
                        <span>Semana X (3 Abril - 9 Abril 2022)</span>
                    </div>
                    <div class="row" style="text-align: left;margin-bottom: 0;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;padding-left: 15px;">
                        <span style="">Institución: Universidad del Rosario - Escuela Colombiana de Ingenieria Julio Garavito</span>
                    </div>
                    <div class="row" style="text-align: left;margin-bottom: 0;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;padding-left: 15px;padding-right: 15px;">
                        <span style="">OBJETIVO PRINCIPAL DE LA REUNIÓN:</span>
                        <input type="text" id="ObjPrincipal" name="ObjPrincipal" required minlength="20" maxlength="200" size="10" placeholder="Ingrese el objetivo general de la reunión" style="text-align:left">
                    </div>

                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col m6 l6 s6">
                            <div class="row" style="border-style: solid;border-color:gray;border-width: 1px;border-right-style:none;border-top-style:none;margin-bottom: 0px;padding-bottom: 1px;">    
                                <span>Fecha:</span>
                                <div style="width:94%"><input style = "margin-left: 1em;margin-right: 1em;height:20px;font-size:1em" id="fechainicio" type="text" class="datepicker" placeholder="Seleccione"></div>
                            </div>
                            <div class="row" style="margin-bottom: 0px;">    
                                <div class="col m6 l6 s6" style="border-style: solid;border-color:gray;border-width: 1px;border-right-style:none;border-top-style:none;padding-left: 15px;padding-right: 15px;padding-bottom: 1px;">
                                    <span>Hora Inicio:</span>
                                    <input id="horainicio" type="text" class="timepicker" placeholder="Seleccione" style="font-size: 1em;height: 20px;">
                                </div>
                                <div class="col m6 l6 s6" style="border-style: solid;border-color:gray;border-width: 1px;border-right-style:none;border-top-style:none;padding-left: 15px;padding-right: 15px;padding-bottom: 1px;">
                                    <span>Hora Fin:</span>  
                                    <input id="horafin" type="text" class="timepicker" placeholder="Seleccione" style="font-size: 1em;height: 20px;">
                                </div>
                            </div>
                        </div>
                        <div class="col m6 l6 s6" style="border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;">
                            <div class="input-field col s12">
                                <span>Modalidad:</span>
                                <select id="Modalidad" name="Modalidad">
                                    <option value=0 selected disabled>Seleccione</option> 
                                    <option value=1>Virtual</option> 
                                    <option value=2>Presencial</option>
                                    <option value=3>Hibrida</option> 
                                </select>
                            </div>
                        </div>            
                    </div>

                    <div class="row" style="text-align: left;margin-bottom: 0;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none;padding-left: 10px;padding-right: 20px;">
                        <span for="Realizador" style="">Acta realizada por:</span>
                        <input type="text" id="Realizador" name="Realizador" required minlength="10" maxlength="100" size="10" placeholder="Nombre de la persona que diligencia el acta" style="">
                    </div>
                    <div class = "row"style="text-align: left;margin-bottom: 0;border-style: solid;border-color:gray;border-width: 1px;border-top-style:none">
                        <div class="input-field col s12">
                            <span>Asistentes:</span>
                            <select MULTIPLE id="Asistentes" name="Asistentes">
                                <option value=0 selected disabled>Seleccione</option> 
                                <option value=1>Virtual</option> 
                                <option value=2>Presencial</option>
                                <option value=3>Hibrida</option> 
                            </select>
                        </div>               
                    </div> 

                    <br><br>

                    <div class="row" style="text-align: left;padding-bottom: 20px;border-style: solid;border-color:gray;border-width: 1px;padding-left: 10px;padding-right: 10px;margin-bottom: 0px;">
                        <br><b><span style="">Agenda del día:</span></b>        
                        <textarea id="Agenda" name="Agenda" required style="height: 100px;"></textarea>                
                    </div>
                    <div class="row" style="text-align: left;padding-bottom: 20px;border-style: solid;border-color:gray;border-width: 1px;padding-left: 10px;padding-right: 10px;border-top-style:none;margin-bottom: 0px;">
                        <br><b><span style="">Actividades:</span></b>        
                        <textarea id="Actividades" name="Actividades" required style="height: 100px;"></textarea>                
                    </div>
                    <div class="row" style="text-align: left;padding-bottom: 20px;border-style: solid;border-color:gray;border-width: 1px;padding-left: 10px;padding-right: 10px;border-top-style:none;margin-bottom: 0px;">
                        <br><b><span style="">Tareas para la proxima reunión:</span></b>        
                        <textarea id="Tareas" name="Tareas" required style="height: 100px;"></textarea>                
                    </div>
                    <div class="row" style="text-align: left;padding-bottom: 20px;border-style: solid;border-color:gray;border-width: 1px;padding-left: 10px;padding-right: 10px;border-top-style:none;margin-bottom: 0px;">
                        <br><b><span style="">Observaciones:</span></b>        
                        <textarea id="Observaciones" name="Observaciones" required style="height: 100px;"></textarea>                
                    </div>

                    <!-- Fin -->
                </div>
            </div>
        </div>
        
    </div>


    <main id='app' style = "zoom:88%">
    </main>
    
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  
    <script src="../js/materialize.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/appLogin.js"></script>
    <script src="../js/imagenes.js"></script>
    <?php include '../includes/footer.php';?>

</body>

</html>