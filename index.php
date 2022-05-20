<?php 

require 'config/db.php';

$db = new Database();

$con = $db->conectar();

$comando = $con->query("SELECT id, nombre, email, sexo, 
    CASE
    WHEN area_id = 1 THEN 'Administrativa y Financiera'
    WHEN area_id = 2 THEN 'Ingeniería'
    WHEN area_id = 5 THEN 'Desarrollo de Negocio'
    WHEN area_id = 6 THEN 'Proyectos'
    WHEN area_id = 7 THEN 'Servicios'
    WHEN area_id = 8 THEN 'Calidad'
    END as area_id, 
    CASE
    WHEN boletin = 1 THEN 'Si'
    WHEN boletin = 0 THEN 'No'
    END as boletin, descripcion FROM empleado");
$areas = $con->query("SELECT id, nombre FROM areas");

$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
$res_areas = $areas->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website with a contact Form 01</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<script type="text/javascript">
$(document).ready(function(){  
    $(".botonmoodificar").click(function () {
        $('.modificar').hide("slow");
        $('.modificar').show("slow");
        $('.crear').hide("slow");
    });
});

$(document).ready(function(){  
    $(".creare").click(function () {
        $('.crear').toggle("slow");
        $('.modificar').hide("slow");

    });
});

$(document).ready(function() {
    $(document).on('click', '.botonmoodificar', function() {
        var id = $(this).val();
        var nombre = $('#nombre' + id).text();
        var correo = $('#correo' + id).text();
        var sexo = $('#sexo' + id).text();
        var area = $('#area' + id).text();
        var boletin = $('#boletin' + id).text();
       
        $('#nombre').val(nombre);
        $('#correo').val(correo);
        $('#earea').val(area);
        $('#eboletin').val(boletin);
        if(sexo=="M"){
            document.querySelector('#esexo1').checked = true;
        }else{
             document.querySelector('#esexo2').checked = true;
        }
       


    });
});
$(document).ready(function() {
    $(document).on('click', '.delete', function() {
        var id = $(this).val();
        var identificacion = $('#identificacion' + id).text();   
        $('#didentificacion').val(identificacion);
    });
});

$(document).ready(function() {
    $(document).find("input:checked[type='radio']").addClass('bounce');   
    $("input[type='radio']").click(function() {
        $(this).prop('checked', false);
        $(this).toggleClass('bounce');

        if( $(this).hasClass('bounce') ) {
            $(this).prop('checked', true);
            $(document).find("input:not(:checked)[type='radio']").removeClass('bounce');
        }
    });
});
</script>
<body>
    <div class="content crear">
        <h1 class="logo">FORMULARIO </h1>
        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contact us</h3>
                <form method="POST" action="guarda.php" autocomplete="off">
                    <p>
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" required autofocus>
                    </p>
                    <p>
                        <label>Correo electronico</label>
                        <input type="email" name="correo" required>
                    </p>
                    <p class="block">
                        <label>Área</label> 
                    <select class="selcts sec" name="area" aria-label="Default select example" required>

                      <option value="" selected>Seleccione una Área</option>
                            <?php foreach ($res_areas as $row){ 
                            ?> 
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                                }
                            ?>

                    </select>
                    </p>
                    <p>Sexo:</p><br>
                    <p class="colum">
                    <input type="radio" id="age1" name="sexo" value="M" checked>
                      <label for="age1 titulo">Masculino</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="age2" name="sexo" value="F">
                      <label for="age2">Femenino</label>
                    </p>
                      
                 
                      
                    <p class="block">
                       <label>Descripción</label> 
                        <textarea name="descripcion" rows="3" required></textarea>
                    </p>  
                    <p>Boletín:</p><br>
                    
                    <p class="colum">
                        <input type="radio" id="age2" name="boletin" value="1">
                      <label for="age2">Desea recibir boletín informativo</label>
                    </p>
                    <br>
                    <p>Roles:</p><br>
                    <p class="colum">
                    <input type="radio"  id="sexo1" name="r1" value="1">
                      <label for="sexo1 titulo">Desarrollador</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="age2" name="r2" value="2">
                      <label for="age2">Analista</label>
                    </p>
                    <p class="colum">
                    <input type="radio" id="age1" name="r3" value="3">
                      <label for="age1 titulo">Tester</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="age2" name="r4" value="4">
                      <label for="age2">Diseñador</label>
                    </p>
                    <p class="colum">
                    <input type="radio" id="age1" name="r5" value="5">
                      <label for="age1 titulo">Profesional PMO</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="age2" name="r6" value="6">
                      <label for="age2">Profesional de servicios</label>
                    </p>
                    <p class="colum">
                    <input type="radio" id="age1" name="r7" value="7">
                      <label for="age1 titulo">Auxiliar administrativo</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="age2" name="r8" value="8">
                      <label for="age2">Codirector</label>
                    </p>
                           
                    <p class="block">
                        <button name="crear">
                            Crear
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>Información</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Marlon Miranda</li>
                    <li><i class="fas fa-phone"></i> 3173202747</li>
                    <li><i class="fas fa-envelope-open-text"></i> marlonmira.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content modificar" style="display: none;" >
        <h1 class="logo">FORMULARIO MODIFICAR</h1>
        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contact us</h3>
                <form method="POST" action="guarda.php" autocomplete="off">
                    <p>
                        <label>Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" required autofocus>
                    </p>
                    <p>
                        <label>Correo electronico</label>
                        <input type="email" id="correo" name="correo" required>
                    </p>
                    <p class="block">
                        <label>Área</label> 
                    <select class="selcts sec" id="earea" name="area" aria-label="Default select example" required>

                      <option value="" selected>Seleccione una Área</option>
                            <?php foreach ($res_areas as $row){ 
                            ?> 
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                                }
                            ?>

                    </select>
                    </p>
                    <p>Sexo:</p><br>
                    <p class="colum">
                    <input type="radio" id="esexo1" name="esexo" value="M">
                      <label for="age1 titulo">Masculino</label>
                    </p>
                    <p class="colum">
                        <input type="radio" id="esexo2" name="esexo" value="F">
                      <label for="age2">Femenino</label>
                    </p>
                      
                 
                      
                    <p class="block">
                       <label>Descripción</label> 
                        <textarea name="descripcion" rows="3" required></textarea>
                    </p>  
                    <p>Boletín:</p><br>
                    
                    <p class="colum">
                        <input type="radio" id="eboletin" name="boletin" value="1">
                      <label for="eboletin">Desea recibir boletín informativo</label>
                    </p>
                    <p class="block">
                        <button>
                            Modificar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>Información</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Marlon Miranda</li>
                    <li><i class="fas fa-phone"></i> 3173202747</li>
                    <li><i class="fas fa-envelope-open-text"></i> marlonmira.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <h1 class="logo"><span>EMPLEADOS</span></h1>
        <div class="colum">
            <h3 class="titulo creare" style="">Crear</h3>
            <input class="creare" type="image" src="img/boton.png"  height="60" width="60"/>
        </div>
        <div class="panel animated bounceInUp">
            <table class="table-dark">
              <thead>
                <tr>
                  <th >Nombre</th>
                  <th >Email</th>
                  <th >Sexo</th>
                  <th >Area</th>
                  <th >Boletin</th>
                  <th >Modificar</th>
                  <th >Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach($resultado AS $row){ 
                ?>
                <tr>
                        <td><span id="nombre<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></span></td>
                        <td><span id="correo<?php echo $row['id'] ?>"><?php echo $row['email'] ?></span></td>
                        <td><span id="sexo<?php echo $row['id'] ?>"><?php echo $row['sexo'] ?></span></td>
                        <td><span id="area<?php echo $row['id'] ?>"><?php echo $row['area_id'] ?></span></td>
                        <td><span id="boletin<?php echo $row['id'] ?>"><?php echo $row['boletin'] ?></span></td>
                        <td><center><input value="<?php echo $row['id'] ?>" type="image" class="botonmoodificar" src="img/boton.png"  height="40" width="40"/></center> </td>
                        <td> <center><input type="image" id="eliminar" src="img/boton.png"  height="40" width="40"/></center> </td>
                </tr>
                <?php } ?>
                
              </tbody>
            </table>     
        </div>
    </div>
</body>
</html>