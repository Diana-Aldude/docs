<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="http://www.cimacolegioamericano.com/uploads/1/1/4/0/114041349/s495493834850160571_p35_i1_w300.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Listado de libros</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
include('header.php');
include('control/conexion.php');
?>
<div class="container">
    <br>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./lista_libros.php">Inicio</a></li>
    <li class="breadcrumb-item">Editar libro</li>
  </ol>
</nav>
	<form method='post'>
	    <?php
	    $sql2=mysqli_query($con,"SELECT `titulo_libro`, `autor`, c.id_categoria_libro, c.categoria_libro 
	                            FROM libros l 
	                            join categorias_libros c 
	                            on c.id_categoria_libro=l.id_categoria_libro 
	                            WHERE id_libro = $_GET[n]");
	    while($row2=mysqli_fetch_array($sql2)){
	    ?>
	    
	    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre del libro</label>
      <input class="form-control" placeholder="Nombre del libro" name='nlibro' value='<?=utf8_encode($row2['titulo_libro'])?>'>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Autor del libro</label>
      <input class="form-control" placeholder="Autor del libro" name='nautor' value="<?=utf8_encode($row2['autor'])?>">
    </div>
  </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputState">Categoría de libro</label>
          <select class="form-control" name='id_categoria'>
              <option value='<?=$_GET['n']?>'> <?=utf8_encode($row2['categoria_libro'])?> </option>
              <?php
              $sql1=mysqli_query($con,'SELECT `id_categoria_libro`, `categoria_libro` FROM categorias_libros ');
              while($row1=mysqli_fetch_array($sql1)){
              ?>
              <option value='<?=$row1['id_categoria_libro']?>'>
                  <?=utf8_encode($row1['categoria_libro'])?>
              </option>
              <?php
              }
              ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">Imagen del libro</label><br>
            <input type="file" name='foto'>
        </div>
      </div>
        <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Acepto terminos y condiciones
          </label>
        </div>
      </div>
	    
	    <?php
	    }
	    ?>
  <button type="submit" class="btn btn-primary" name='guardar'>Guardar y volver</button>
  <button type="submit" class="btn btn-primary" name='guardar'>Guardar</button>
  <button type="button" class="btn btn-danger">Cancelar</button>
</form>
<?php
    if(isset($_POST['guardar'])){
        $sql2=mysqli_query($con,"INSERT INTO `libros`(`titulo_libro`, `autor`, `id_categoria_libro`) 
                           VALUES ('$_POST[nlibro]', '$_POST[nautor]', '$_POST[id_categoria]')");
        echo "<script>alert('Registro Exitoso!');
        location.href='lista_libros.php'</script>";
    }
?>
</div>

</body>
</html>