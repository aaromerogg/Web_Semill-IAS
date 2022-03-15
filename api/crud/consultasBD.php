<?php

	 $host = "34.203.1.178"; // host o servidor donde esta la base de dtos
    $usuario = "neverasiot2"; // ususario autorizado de la base de datos 
    $contrasena = "neverasiot"; // contraseña 
    $db = "neveracvd"; // Nombre de la base de datos
    


  $conexion = new PDO('mysql:host=34.203.1.178;dbname=neveracvd',$usuario,$contrasena);  //$sql= "SELECT * FROM historicotabular ORDER BY ano"; // cadena de consulta

  switch ($_GET['q']) {
  	case 1:  // Temperatura -- GetDataHist
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM temperature WHERE equipo = '$equipo' ORDER BY id DESC limit 20");
    $statement-> execute();
    $results= $statement -> fetchAll
    (PDO::FETCH_ASSOC);
    $results = array_reverse($results);
    $json= json_encode($results);
    
    echo $json;
    break;
  	 
    case 2:  // Temperatura -- GetData
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM temperature WHERE equipo = '$equipo' ORDER BY fecha DESC, hora DESC LIMIT 1");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    
    echo $json;
    break;

    case 3:  // Corriente -- GetDataHist
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM current WHERE equipo = '$equipo' ORDER BY id DESC limit 20");
    $statement-> execute();
    $results= $statement -> fetchAll
    (PDO::FETCH_ASSOC);
    $results = array_reverse($results);
    $json= json_encode($results);

    echo $json;
    break;

    case 4:  // Corriente -- GetData
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM current WHERE equipo = '$equipo' ORDER BY id DESC LIMIT 1");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);

    echo $json;
    break;

    case 5:  // Temperatura -- InformeFechas
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];
    $numdatos = $_GET['numdatos'];
    $statement= $conexion -> prepare("SELECT * FROM temperature WHERE equipo = '$equipo' and fecha <= '$ffin' ORDER BY fecha DESC, hora DESC limit $numdatos");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);

    echo $json;
    break;

    case 6:  //Corriente --InformeFechas
   
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];
    $numdatos = $_GET['numdatos'];
    $statement= $conexion -> prepare("SELECT * FROM current WHERE equipo = '$equipo' and fecha <= '$ffin' ORDER BY fecha DESC, hora DESC limit $numdatos");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);

    echo $json;
    break;


    case 7:  //Variables ambientales -- GetDataHist
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM temphum WHERE equipo = '$equipo' ORDER BY id DESC limit 20");
    $statement-> execute();
    $results= $statement -> fetchAll
    (PDO::FETCH_ASSOC);
    $results = array_reverse($results);
    $json= json_encode($results);
    
    echo $json;
    break;
  	
    case 8:  //Variables ambientales -- GetData
    $equipo= $_GET['equipo'];
    $statement= $conexion -> prepare("SELECT * FROM temphum WHERE equipo = '$equipo' ORDER BY id DESC LIMIT 1 ");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    
    echo $json;
    break;

    case 9: //Variables ambientales -- Modificar tabla -- InformeFechas
   
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];
    $numdatos = $_GET['numdatos'];
    $statement= $conexion -> prepare("SELECT * FROM temphum WHERE equipo = '$equipo' and fecha <= '$ffin' ORDER BY fecha DESC, hora DESC limit $numdatos");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
  
    echo $json;
    break;

    case 10: // Temperatura -- GetData Alertas
   
    $hora= $_GET['hora'];
    $fecha= $_GET['fecha'];
    $equipo= $_GET['equipo'];
    
    $statement= $conexion -> prepare("SELECT * FROM alerttemperature WHERE fecha >= '$fecha' and hora >= '$hora' and equipo = '$equipo'  ORDER BY hora DESC");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    
    echo $json;
    break;

    case 11:
    $variable= $_GET['variable'];
    $equipo= $_GET['equipo'];
    
    $statement= $conexion -> prepare("SELECT * FROM rango WHERE (variable = $variable) and (equipo = '$equipo')  ORDER BY fecha DESC, hora DESC LIMIT 1");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    echo $json;
    
    break;

    case 12: // Corriente -- GetData Alertas
   
    $hora= $_GET['hora'];
    $fecha= $_GET['fecha'];
    $equipo= $_GET['equipo'];
      
    $statement= $conexion -> prepare("SELECT * FROM alertcurrent WHERE fecha >= '$fecha' and hora >= '$hora' and equipo = '$equipo' ORDER BY hora DESC");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
      
    echo $json;
    break;

    case 13:
   
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];

    $statement= $conexion -> prepare("SELECT * FROM alerttemperature WHERE fecha >= '$finicio' and fecha <= '$ffin' and equipo = '$equipo' ORDER BY fecha DESC,hora DESC");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    
    echo $json;
      break;
    
    case 14:
   
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];
    
    $statement= $conexion -> prepare("SELECT * FROM alertcurrent WHERE fecha >= '$finicio' and fecha <= '$ffin' and equipo = '$equipo' ORDER BY fecha DESC ORDER BY fecha DESC, hora DESC");  
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
        
    echo $json;
      break;

    case 15:
   
    $finicio= $_GET['finicio'];
    $ffin= $_GET['ffin'];
    $equipo= $_GET['equipo'];
    $variable = $_GET['variable'];
    
    $statement= $conexion -> prepare("SELECT * FROM rango WHERE fecha >= '$finicio' and fecha <= '$ffin' and variable = '$variable' and equipo = '$equipo' ORDER BY fecha DESC, hora DESC");  
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
        
    echo $json;
      break;

    case 16: // Informe Before
    $finicio= $_GET['inicio'];
    $fechai= $_GET['fechai'];
    $horai= $_GET['horai'];
    $idi= $_GET['idi'];
    $equipo= $_GET['equipo'];
    $numdatos = $_GET['numdatos'];
    $vartable = $_GET['vartable'];
    $statement= $conexion -> prepare("SELECT * FROM $vartable WHERE equipo = '$equipo' and fecha <= '$fechai' and id <= '$idi' and fecha >= '$finicio' ORDER BY fecha DESC, hora DESC limit $numdatos");
    
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
    
    echo $json;
      break;

    case 17:  //InformeFechas Next
    $ffin= $_GET['fin'];
    $fechaf= $_GET['fechaf'];
    $horaf= $_GET['horaf'];
    $idf= $_GET['idf'];
    $equipo= $_GET['equipo'];
    $numdatos = $_GET['numdatos'];
    $vartable = $_GET['vartable'];
    $statement= $conexion -> prepare("SELECT * FROM $vartable WHERE equipo = '$equipo' and fecha >= '$fechaf' and id >= '$idf' and fecha <= '$ffin' ORDER BY fecha DESC, hora DESC limit $numdatos");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
            
    echo $json;
      break;

    case 18:  //InformeFechas pdf
    $finicio= $_GET['inicio'];
    $ffin= $_GET['fin'];
    $equipo= $_GET['equipo'];
    $vartable = $_GET['vartable'];
    //$statement= $conexion -> prepare("SELECT * FROM datos WHERE equipo = '$equipo' and fecha <= '$ffin' ORDER BY fecha DESC, hora DESC limit $numdatos");
    $statement= $conexion -> prepare("SELECT * FROM $vartable WHERE fecha >= '$finicio' and fecha <= '$ffin' and equipo = '$equipo' ORDER BY fecha DESC, hora DESC");
    $statement-> execute();
    $results= $statement -> fetchAll(PDO::FETCH_ASSOC);
    $json= json_encode($results);
          
    echo $json;
      break;

  	default:
  		echo "Error de consulta";
  		
      break;
  }


?>