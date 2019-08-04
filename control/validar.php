<?php
$con=mysqli_connect('localhost','root','','docs'); //or die('Problema con la conexion');
if (isset($_POST['login'])) 
{
    //VARIABLES DEL USUARIO
$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user=='admin@admin.com'&$pass=='admin') 
    {
     echo "<script>
    location.href='../admin/productos';
    </script>";
    }
//VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
if (substr($user,0,1)=="'" | empty($user) | empty($pass))
    {
    echo "<script>
    alert('Inserte datos!');
    location.href='../login';
    </script>";
    exit();
    }
//VALIDANDO EXISTENCIA DEL USUARIO
$sql = mysqli_query($con,"
    SELECT * from usuarios 
    where correo = '$user' 
    and pass = '$pass' ");
if ($row = mysqli_fetch_array($sql))
        {
        session_start();
        $_SESSION['user'] = $row['user'];
        $_SESSION['id_user'] = $row['id_usuario'];
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['nombres'] = $row['nombres'];
        $_SESSION['tel'] = $row['tel'];
        $_SESSION['foto'] = $row['foto'];
    echo "<script>
    location.href='../admin/notificaciones.php';
    </script>";
        }else
            {
            $sql2 = mysqli_query($con,"
            SELECT * from usuarios 
            where user = '$user' 
            and pass = '$pass' ");
        if ($row2 = mysqli_fetch_array($sql2))
                {
                ini_set("session.cookie_lifetime","17200");
                ini_set("session.gc_maxlifetime","17200");
                session_start();
                $_SESSION['user'] = $row2['user'];
                $_SESSION['id_user'] = $row2['id_usuario'];
                $_SESSION['rol'] = $row2['rol'];
                $_SESSION['nombres'] = $row2['nombres'];
                $_SESSION['tel'] = $row2['tel'];
                $_SESSION['foto'] = $row2['foto'];
            echo "<script>
            location.href='../admin/notificaciones.php';
            </script>";
            header("location:../admin/notificaciones.php");
                }
               else {
                     echo "<script>
                    alert('ERROR!');
                    location.href='../login';
                    </script>";
                        exit();
                }    
        
        }
}
mysqli_free_result($sql);
mysqli_close($con);
?>
