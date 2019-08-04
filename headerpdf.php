<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/superhero/bootstrap.min.css" rel="stylesheet" integrity="sha384-LS4/wo5Z/8SLpOLHs0IbuPAGOWTx30XSoZJ8o7WKH0UJhRpjXXTpODOjfVnNjeHu" crossorigin="anonymous">	<title>Listado de libros</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    .contenido{
        margin:0px 100px 0px 100px;
    } 
    .sub_titulo{
        font-weight: bold;
    }
    .espacio{
        margin-left:30px;
    }
    .detalle_sub_titulo{
        margin-left:50px;
    }
    .contenido_sub_titulo{
        margin-bottom: 30px;
    }
    p{
        margin-bottom: 8px;
    }
    .txt_caja1{
        border:none;
        padding:0px;
        font-weight: 500;
        text-align: center;
    }
    .txt_caja2{
        border:none;
        padding:0px;
        font-weight: 500;
    }
    .txt_caja3{
        border:none;
        padding:0px;
        max-height:300px;
        min-height: 100px;
        width: 97%;
        margin:0px;
        -webkit-scrollbar { width: 0 !important }
    }
    @media (min-width: 1200px) {
      .container {
            max-width: 800px!important;
      }
    }
    @media (max-width: 650px) {
      .contenido{
        margin:0px;
    } 
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Sistema de libros</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="lista_libros.php">Inicio <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="lista_usuarios.php">Listado de usuarios</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Listado de autores</a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" type="search" placeholder="Nombre de palabra" aria-label="Search" name='p' autofocus>
      <input name='n' style='visibility:hidden;position:absolute' value='<?=$_GET['n']?>'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='b'>Buscar</button>
    </form>
    <?php
    if(isset($_GET['b'])){
         if($_GET['p']==null){
        	  echo "<script>location.href='ver_libro.php?n=$_GET[n]'</script>";
        	 }
    }
    ?>
    <a href='index.php' class="btn btn-outline-danger my-2 my-sm-0">Cerrar</a>
  </div>
</nav>