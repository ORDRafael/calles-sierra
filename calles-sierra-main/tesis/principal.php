<?php
include("conexion.php");
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
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="css/style-principal.css">
    
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

        <section class="main">
            <div class="main-top">
                <h1>Seccion de Navegación</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="navegation">
                <div class="card">
                    <object data="icon/bed-solid.svg"></object>
                    <h3>Lista de Pacientes</h3>
                    <p>Visualiza la lista de pacientes.</p>
                    <button>Ver</button>
                </div>
                <div class="card">
                    <object data="icon/hospital-user-solid.svg"></object>
                    <h3>Registo de Pacientes</h3>
                    <p>Agrega un paciente al sistema.</p>
                    <button>Registrar</button>
                </div>
                <div class="card">
                    <object data="icon/user-doctor-solid.svg"></object>
                    <h3>Lista de Médicos</h3>
                    <p>Visualiza la lista de nuestros médicos</p>
                    <button>Ver</button>
                </div>
                <div class="card">
                    <object data="icon/laptop-medical-solid.svg"></object>
                    <h3>Registrar Médico</h3>
                    <p>Agrega un especialista al sistema.</p>
                    <button>Registrar</button>
                </div>
                <div class="card">
                    <object data="icon/notes-medical-solid.svg"></object>
                    <h3>Citas</h3>
                    <p>Agenda una cita!!</p>
                    <button>Agendar</button>
                </div>
            </div>

        </section>
    </div>

</body>
</html>