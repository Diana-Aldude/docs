<?php
include('header.php');
?>
<body>
<div class="container-fluid">
    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./lista_libros.php">Inicio</a></li>
    <li class="breadcrumb-item">Listado de usuarios</li>
  </ol>
</nav>
	<table class="table table-responsive" style='text-align:center'>
		<tr style='background:#4E5D6C'>
			<th>N</th>
			<th>Nombres</th>
			<th>Tel</th>
			<th>Fecha creacion</th>
			<th>Opciones</th>
		</tr>
		<?php
		include('control/conexion.php');
		$sql = mysqli_query($con,"SELECT * FROM usuarios ");
		while($row=mysqli_fetch_array($sql)){
		?>
			<tr>
			<td><?=$row['id_usuario']?></td>
			<td><?=utf8_encode($row['nombres'])?></td>
			<td><?=$row['tel']?></td>
			<td><?=$row['fecha_creacion']?></td>
			<td>
				<a href="ver_libro.php?n=<?=$row['id_libro']?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
				<button data-toggle="modal" data-target="#editar<?=$row['id_libro']?>" class="btn btn-warning"> <i class="far fa-edit"></i> </button>
				<a href="#" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </a>
			</td>
		</tr>
		
		
		<?php
		}
		?>
	
	</table>
</div>
<div class="modal" id="nuevo_libro">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Nuevo Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method='post'>
              <div class="modal-body">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nombre</label>
                      <input class="form-control" placeholder="Nombre del libro" name='nlibro' >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Autor del libro</label>
                      <input class="form-control" placeholder="Autor del libro" name='nautor' >
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputState">Categor¨ªa de libro</label>
                      <select class="form-control" name='id_categoria'>
                          <option value='<?=$_GET['n']?>'> <?=utf8_encode($row['categoria_libro'])?> </option>
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
                    <div class="form-group col-md-12">
                      <label for="inputState">Imagen del libro</label><br>
                        <input type="file" name='foto'>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name='save_nl'>Guardar y mostrar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<div class="modal" id="borrar_libro">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Borrar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method='post'>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" name='save_nl'>Borrar y continuar</button>
              </div>
              </form>
        </div>
    </div>
</div>

</body>
</html>