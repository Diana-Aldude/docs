<?php
include('header.php');
?>
<body>
<div class="container-fluid">
    <p>
    <button data-toggle="modal" data-target="#nuevo_libro" class="btn btn-primary btn-sm" style='position:absolute;right:20px'> Agregar nuevo libro </button>
    <h4>Listado de libros</h4>
	</p>
	<table class="table table-responsive" style='text-align:center;'>
		<tr style='background:#4E5D6C'>
			<th>N</th>
			<th>Titulo</th>
			<th>Autor</th>
			<th>Fecha</th>
			<th>Opciones</th>
		</tr>
		<?php
		include('control/conexion.php');
		$sql = mysqli_query($con,"SELECT `id_libro`, `titulo_libro`, `autor`, `fecha_creacion`, c.categoria_libro, c.id_categoria_libro
		                        FROM libros l 
	                            join categorias_libros c 
	                            on c.id_categoria_libro=l.id_categoria_libro 
	                            where titulo_libro like '%$_GET[l]%' 
	                            order by id_libro desc");
		while($row=mysqli_fetch_array($sql)){
		?>
			<tr>
			<td><?=$row['id_libro']?></td>
			<td data-toggle="modal" data-target="#capitulos<?=$row['id_libro']?>">
			    <?=utf8_encode($row['titulo_libro'])?>
			</td>
			<td data-toggle="modal" data-target="#capitulos<?=$row['id_libro']?>">
			    <?=utf8_encode($row['autor'])?></td>
			<td data-toggle="modal" data-target="#capitulos<?=$row['id_libro']?>">
			    <?=$row['fecha_creacion']?>
			</td>
			<td >
				<a href="ver_libro.php?n=<?=$row['id_libro']?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
				<button data-toggle="modal" data-target="#editar<?=$row['id_libro']?>" class="btn btn-warning"> <i class="far fa-edit"></i> </button>
				<button data-toggle="modal" data-target="#borrar_libro<?=$row['id_libro']?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </button>
			</td>
		</tr>
		<!-- Modal CAPITULOS POR LIBRO -->
        <div class="modal" id="capitulos<?=$row['id_libro']?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Capitulos del libro: <?=utf8_encode($row['titulo_libro'])?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                    <div class="form-row">
                        <?php
                        $cc=1;
                        $sqlc = mysqli_query($con,"SELECT `id_capitulo_libro` FROM capitulos_libros c 
                                            join libros l
                                            on l.id_libro=c.id_libro
                                            WHERE l.id_libro = $row[id_libro]");
                        while($rowc=mysqli_fetch_array($sqlc)){
                        ?>
                        
                        <div class="col-2 col-lg-1" style='border:.5px solid white;text-align:center'>
                            <a href='ver_capitulo.php?n=<?=$row['id_libro']?>&c=<?=$rowc['id_capitulo_libro'];?>'>
                                <label for="1"><?=$cc++;?></label>
                            </a>
                        </div>
                      
                        <?php
                        }
                        ?>
                    </div>
                </div>
          </div>
        </div>
    </div>
		<!-- Modal EDITAR LIBRO -->
        <div class="modal" id="editar<?=$row['id_libro']?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Nuevo Detalle Sub Titulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method='post'>
              <div class="modal-body">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type='hidden' name='id_libro' value='<?=$row['id_libro']?>'>
                      <label for="inputEmail4">Nombre del libro</label>
                      <input class="form-control" placeholder="Nombre del libro" name='titulo_libro' value='<?=utf8_encode($row['titulo_libro'])?>'>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Autor del libro</label>
                      <input class="form-control" placeholder="Autor del libro" name='autor' value="<?=utf8_encode($row['autor'])?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputState">Categoría de libro</label>
                      <select class="form-control" name='id_categoria_libro'>
                          <option value='<?=$row['id_categoria_libro']?>'><?=utf8_encode($row['categoria_libro'])?></option>
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
                <button type="submit" class="btn btn-primary" name='editar_libro'>Editar y mostrar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
<!-- MORAL BORRAR LIBRO-->
<div class="modal" id="borrar_libro<?=$row['id_libro']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seguro de borrar el libro <?=$row['id_libro']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method='post'>
              <div class="modal-footer">
                 <input type='hidden' value='<?=$row['id_libro']?>' name='id_libro'>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" name='borrar_libro'>Borrar y continuar</button>
              </div>
              </form>
        </div>
    </div>
</div>
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
                      <label for="inputEmail4">Nombre del libro</label>
                      <input class="form-control" placeholder="Nombre del libro" name='nlibro' >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Autor del libro</label>
                      <input class="form-control" placeholder="Autor del libro" name='nautor' >
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputState">Categoría de libro</label>
                      <select class="form-control" name='id_categoria'>
                          <option value='3'> -- Seleccionar categoria -- </option>
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
        <?php
        //AGREGAR NUEVO LIBRI
        if(isset($_POST['save_nl'])){
             $sql=mysqli_query($con,"INSERT INTO `libros`(`titulo_libro`, `autor`, `id_categoria_libro`) 
                            VALUES ('$_POST[nlibro]', '$_POST[nautor]', '$_POST[id_categoria]')");
            echo "<script>location.href='lista_libros.php'</script>";
        }
        //BORRAR LIBRO
        if(isset($_POST['borrar_libro'])){
             $sql=mysqli_query($con,"DELETE FROM `libros` WHERE id_libro = $_POST[id_libro]");
            echo "<script>location.href='lista_libros.php'</script>";
        }
        //EDITAR LIBRO
        if(isset($_POST['editar_libro'])){
             $sql=mysqli_query($con,"UPDATE `libros` 
                                SET `titulo_libro`= '$_POST[titulo_libro]',`autor`= '$_POST[autor]',`id_categoria_libro`= '$_POST[id_categoria_libro]' 
                                WHERE id_libro = $_POST[id_libro]");
            echo "<script>location.href='lista_libros.php'</script>";
        }
       
        ?>
</body>
</html>