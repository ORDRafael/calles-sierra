<?php 
include("send.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:login.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Médico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/style-principal.css">
    <link rel="stylesheet" href="css/style-lista-paciente.css">
</head>
<body>

    <div class="container">
        <nav>
            <ul>
                <li><a href="principal.php" class="logo">
                    <img src="img/LogoCallesSierra.png" alt="">
                    <span class="nav-item">Calles Sierra</span>
                </a></li>
                <li><a href="principal.php">
                    <object data="icon/house-solid.svg"></object>
                    <span class="nav-item">Inicio</span>
                </a></li>
                <li><a href="perfil.php">
                    <object data="icon/user-solid.svg"></object>
                    <span class="nav-item">Perfil</span>
                </a></li>
                <li><a href="lista-paciente.php">
                    <object data="icon/bed-solid.svg"></object>
                    <span class="nav-item">Lista de Pacientes</span>
                </a></li>
                <li><a href="registro-paciente.php">
                    <object data="icon/hospital-user-solid.svg"></object>
                    <span class="nav-item">Registrar Paciente </span>
                </a></li>
                <li><a href="lista-medicos.php">
                    <object data="icon/user-doctor-solid.svg"></object>
                    <span class="nav-item">Lista de Médicos</span>
                </a></li>
                <li><a href="registro_medico.php">
                    <object data="icon/laptop-medical-solid.svg"></object>
                    <span class="nav-item">Registrar Médicos</span>
                </a></li>
                <li><a href="citas.php">
                    <object data="icon/notes-medical-solid.svg"></object>
                    <span class="nav-item">Citas</span>
                </a></li>
                <li><a href="#">
                    <object data="icon/gear-solid.svg"></object>
                    <span class="nav-item">Configuración</span>
                </a></li>
                <li><a href="#">
                    <object data="icon/question-solid.svg"></object>
                    <span class="nav-item">Help</span>
                </a></li>
                <li><a href="logout.php">
                    <object data="icon/right-from-bracket-solid.svg"></object>
                    <span class="nav-item">Logout</span>
                </a></li>
            </ul>
        </nav>
          
        <section class="main-page">
          <h1>Registrar médico</h1>
                <div class="course-box">
                
                    <form class="form" method="post" autocomplete="off">
                     <h2>Anadir medicos</h2>
                        
                    <div class="input-group">
                
                        <div class="input-container">
                        <input type="text" name="nombre" placeholder="Nombre">
                        <i class="fa-solid fa-user"></i>
                        </div>
                
                        <div class="input-container">
                        <input type="text" name="apellido" placeholder="Apellido">
                        <i class="fa-solid fa-user"></i>
                        </div>
                
                        <div class="input-container">
                        <input type="number" name="cedula" placeholder="Cedula">
                        <i class="fa-solid fa-phone"></i>
                        </div>
                        
                        <div class="input-container">
                        <input type="tel" name="telefono"placeholder="Telefono">
                        <i class="fa-solid fa-phone"></i>
                        </div>
                
                        <div class="input-container">
                        <input type="email" name="correo"placeholder = "Email">
                        <i class="fa-solid fa-envelope"></i>
                        </div>
                
                        <div>
                        <select name="especialidad">
                            <option>Cardiologia</option>
                            <option>Alergología</option>
                            <option>Endocrinología</option>
                            <option>Gastroenterología</option>
                            <option>Hematología</option>
                            <option>Medicina interna</option>
                            <option>Nefrología</option>
                            <option>Neumología</option>
                            <option>Neurología</option>
                            <option>Nutriología</option>
                            <option>Oncología</option>
                            <option>Pediatría</option>
                            <option>Psiquiatría</option>
                            <option>Dermatología</option>
                            <option>Traumatología</option>
                            <option>Urologia</option>
                        </select>
                        </div>
                
                         <div>
                        <button class="boton" type="submit" name="send" value="Enviar">Enviar</button>
                        </div>
                
                        <!-- <div> -->
                        <!-- <table>
                            <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>cedula</th>
                            <th>telefono</th>
                            <th>correo</th>
                            <th>especialidad</th>
                            </tr>
                            <tr>
                                <td>Rafael</td>
                                <td>Ordaz</td>
                                <td>27169435</td>
                                <td>04146560053</td>
                                <td>rafael@gmail.com</td>
                                <td>Cardiologia</td>
                            </tr>
                            <tr>
                                <td>Freilix</td>
                                <td>Revilla</td>
                                <td>1</td>
                                <td>0424545455</td>
                                <td>freilix@gmial</td>
                                <td>Neurologo</td>
                            </tr> -->
                
                     <!-- buscador -->
                    <!-- <input type="search" name="buscar" placeholder="especialidad">
                    <input type="submit" value="Buscar"> -->
                
                        </table>
                        </div>
                
                    </div>
                    </form>
                
                </div>
        </section>

    </div>

</body>
</html>