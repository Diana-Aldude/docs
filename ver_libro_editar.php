
<?php
include('headerpdf.php');
include('control/conexion.php');
if(empty($_GET['n'])){
    echo "<script>location.href='lista_libros.php'</script>";
}
?>
<body style='background:#525659'>
<div class="container" style='background:white;padding-top:10px;margin-bottom:30px;color:black'>
    <div class='row'>
	    <div class='col-xs-12 col-lg-12'>
	        <center style='margin-top:50px;padding:180px'>
	            <?php
	            $sqlbase=mysqli_query($con,"SELECT `titulo_libro`, `autor`, `fecha_creacion` FROM `libros` WHERE id_libro = $_GET[n]");
	            while($rowbase=mysqli_fetch_array($sqlbase)){
	            ?> 
	            <h5><?=($rowbase['fecha_creacion'])?></h5>
	            <h1 style='text-transform: uppercase'><?=utf8_encode($rowbase['titulo_libro'])?></h1>
	            <h3 style='text-transform: uppercase'><?=utf8_encode($rowbase['autor'])?></h3>
	             <?php   
	            }
	            ?>
	            
	       </center>
	   </div>
	 </div>
</div>
    <div style='position:absolute;left:20%; padding-top:10px;z-index:10'>
	   <a href='ver_libro.php?n=<?=$_GET['n']?>' class='btn btn-secondary btn-sm'> <i class="fas fa-arrow-left"></i></a>
	   <button data-toggle="modal" data-target="#add_capitulo" class='btn btn-primary btn-sm'>+ Capitulo</button>
	</div>
<?php
	  //CAPITULO - BASE
	  $sql1=mysqli_query($con,"SELECT `id_capitulo_libro`, `capitulo_libro`, `seccion`, `titulo` FROM `capitulos_libros` WHERE id_libro = $_GET[n]");
	  while($row1=mysqli_fetch_array($sql1)){
	  ?>
	  
	  <body style='background:#525659'>
<div class="container" style='background:white;padding-top:10px;margin-bottom:30px'>
    <div class='row'>
	    <div class='col-xs-12 col-lg-12'>
	        <center style='margin-top:50px;'>
	            <button data-toggle="modal" data-target="#delete_capitulo<?=$row1['id_capitulo_libro']?>" class='btn btn-danger btn-sm'> 
                    <i class="fas fa-trash-alt"></i> 
                </button>
                <!-- MODAL BORRAR CAPITULO-->
            	<div class="modal" id="delete_capitulo<?=$row1['id_capitulo_libro']?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Seguro de borrar el capitulo?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method='post' action='ver_libro_editar.php?n=<?=$_GET['n']?>'>
                                  <div class="modal-footer">
                                      <input type='hidden' value='<?=$row1['id_capitulo_libro']?>' name='id_capitulo_libro'>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger" name='delete_capitulo'>Borrar y continuar</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
	            <form method='post'>
	                <input type='hidden' value='<?=$row1['id_capitulo_libro']?>' name='id_capitulo_libro'>
	                <h5>
	                    <input name='capitulo_libro' class='txt_caja1' placeholder='Capitulo' value='<?=$row1['capitulo_libro']?>'>
	                </h5>
	                <h5>
	                    <input name='seccion' class='txt_caja1' placeholder='Seccion' value='<?=$row1['seccion']?>'>
	                </h5>
    	            <h5>
    	                <input name='titulo' class='txt_caja1' placeholder='Titulo' value='<?=$row1['titulo']?>'>
    	            </h5>
    	            <input type='submit' name='editar_capitulo' style='visibility:hidden;position:absolute'>
    	       </form>
	        </center>
	        <hr>
	        <div class='contenido'>
	        <button data-toggle="modal" data-target="#add_sub_titulo<?=$row1['id_capitulo_libro']?>" class='btn btn-success btn-sm'>+ Sub titulo</button>
	        </div>
	        
	        <!-- MODAL SUB TITULO-->
            <div class="modal" id="add_sub_titulo<?=$row1['id_capitulo_libro']?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Nuevo Sub Titulo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method='post'>
                          <div class="modal-body">
                                <input name='sub_titulo' placeholder='Sub titulo...' class='form-control' autofocus>
                                <input name='id_capitulo_libro' value='<?=$row1['id_capitulo_libro']?>' style='position:absolute;visibility:hidden'>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name='save_st'>Guardar y mosrar</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
	        <?php
	            //SUB TITULO
	            $sql2=mysqli_query($con,"SELECT `id_sub_titulo`, `sub_titulo`, `id_capitulo_libro` FROM `sub_titulos` WHERE id_capitulo_libro = $row1[id_capitulo_libro]");
	            while($row2=mysqli_fetch_array($sql2))
	            {
	                $c++;
	           ?>
	           
	        <div class='contenido'>
	            <div class='contenido_sub_titulo'>
	                <p class='sub_titulo'>
	                    <form method='post'>
        	                <span style='color:black'><?=$c?>.</span> 
        	                    <span class='espacio'>
        	                        <input type='hidden' name='id_sub_titulo' value='<?=$row2['id_sub_titulo']?>'>
        	                        <input name='sub_titulo' class='txt_caja2' placeholder='Sub titulo' value='<?=$row2['sub_titulo']?>'>
        	                        <input type='submit' name='editar_sub_titulo' style='visibility:hidden;position:absolute' >
        	                    </span>
        	                <a data-toggle="modal" data-target="#add_detalle_st<?=$row2['id_sub_titulo']?>" class='btn btn-success btn-sm'> + </a>
        	                <a data-toggle="modal" data-target="#delete_st<?=$row2['id_sub_titulo']?>" class='btn btn-danger btn-sm'> 
                                <i class="fas fa-trash-alt"></i> 
                            </a>
        	            </form>
        	        </p>
        	        <!-- Modal BORRAR SUB TITULO -->
            	   <div class="modal" id="delete_st<?=$row2['id_sub_titulo']?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Seguro de borrar el sub titulo? <?=$row2['id_sub_titulo']?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form method='post' action='ver_libro_editar.php?n=<?=$_GET['n']?>'>
                                    <div class="modal-footer">
                                        <input type='hidden' value='<?=$row2['id_sub_titulo']?>' name='id_sub_titulo'>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger" name='delete_sub_titulo'>Borrar y continuar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        	         
        	        <!-- Modal Detalle Sub Titulo -->
                    <div class="modal" id="add_detalle_st<?=$row2['id_sub_titulo']?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Nuevo Detalle Sub Titulo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method='post' action='ver_libro_editar.php?n=<?=$_GET['n']?>'>
                                  <div class="modal-body">
                                        <p>Detalle Sub Titulo</p>
                                        <p>
                                            <textarea name='detalle_sub_titulo' placeholder='Escribe algo...' class='form-control'></textarea>
                                            <input name='id_sub_titulo' value='<?=$row2['id_sub_titulo']?>' style='position:absolute;visibility:hidden'>
                                        </p>
                                        <p>Subir una imagen</p>
                                        <p>
                                            <input name='foto' type='file'>
                                        </p>
                                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" name='save_sc'>Guardar y mostrar</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
        	        <?php
        	        //Detalles SUB TITULO
        	            $sql3=mysqli_query($con,"SELECT id_detalle_sub_titulo, `detalle_sub_titulo`, `foto` FROM detalles_sub_titulos WHERE id_sub_titulo = $row2[id_sub_titulo]
        	            and detalle_sub_titulo like '%$_GET[p]%' ");
        	            while($row3=mysqli_fetch_array($sql3))
        	            {
            	        ?>
            	        <button data-toggle="modal" data-target="#delete<?=$row3['id_detalle_sub_titulo']?>" class='btn btn-danger btn-sm' style='position:absolute;'> 
            	            <i class="fas fa-trash-alt"></i> 
            	        </button>
            	        
            	        <!--FILTRO BUSQUEDA POR PALABRA-->
            	           <p class='detalle_sub_titulo' style='background:yellow'>
            	            <?php
            	            if(isset($_GET['p'])){
            	                echo $_GET['p'];
            	            }
            	            ?>
            	        </p>
            	        <!--FIN BUSQUEDA POR PALABRA-->
            	        <form method='post'>
            	        <p class='detalle_sub_titulo'>
            	            <input type='hidden' name='id_detalle_sub_titulo' value='<?=$row3['id_detalle_sub_titulo']?>'>
            	            <input name='detalle_sub_titulo' class='form-control' value='<?=utf8_encode($row3['detalle_sub_titulo']);?>'>
            	            <input type='submit' name='editar_detalle_sub_titulo' style='position:absolute;visibility:hidden'>
            	       </form>     
            	            <?php
            	            if(isset($row3['foto'])){
            	                echo "<img src='$row3[foto]' style='width:100%;margin-top:15px'>";
            	            }
            	            ?>
            	            </p>
            	        <!-- MODAL BORRAR DETALLE-->
            	        <div class="modal" id="delete<?=$row3['id_detalle_sub_titulo']?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Seguro de borrar el parrafo?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method='post' action='ver_libro_editar.php?n=<?=$_GET['n']?>'>
                                  <div class="modal-footer">
                                      <input type='hidden' value='<?=$row3['id_detalle_sub_titulo']?>' name='id_detalle_sub_titulo'>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger" name='delete_parrafo'>Borrar y continuar</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
        	        <?php
        	            }
	            ?>
	            </div>
	    </div>
	    <?php
	            }
	            ?>
        </div>
    </div>
    
</div>
                <?php
	            }
	            ?>
<!-- Modal Capitulo -->
<div class="modal fade" id="add_capitulo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Capitulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method='post' action="ver_libro_editar.php?n=<?=$_GET['n']?>" >
      <div class="modal-body">
          <p>
              <input name='capitulo' placeholder='Capitulo...' class='form-control' value='CAPITULO ' autofocus>
          </p>
          <p>
              <input name='seccion' placeholder='Sección...' class='form-control'>
          </p>
          <p>
              <input name='titulo' placeholder='Titulo...' class='form-control'>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name='save_capitulo'>Guardar y mostrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
//BOTONES DE INSERTAR
    if(isset($_POST['save_capitulo'])){
        mysqli_query($con,"INSERT INTO `capitulos_libros`(`capitulo_libro`, `seccion`, `titulo`, `id_libro`) 
                            VALUES ('$_POST[capitulo]', '$_POST[seccion]', '$_POST[titulo]', $_GET[n])");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['save_st'])){
        mysqli_query($con,"INSERT INTO `sub_titulos`(`sub_titulo`, `id_capitulo_libro`) VALUES ('$_POST[sub_titulo]', '$_POST[id_capitulo_libro]') ");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['save_sc'])){
        mysqli_query($con,"INSERT INTO `detalles_sub_titulos`(`detalle_sub_titulo`, `id_sub_titulo`) VALUES ('$_POST[detalle_sub_titulo]', '$_POST[id_sub_titulo]') ");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    //BOTONES EDITAR
    if(isset($_POST['editar_capitulo'])){
        mysqli_query($con,"UPDATE `capitulos_libros` 
                    SET `capitulo_libro`='$_POST[capitulo_libro]',`seccion`='$_POST[seccion]',`titulo`= '$_POST[titulo]' 
                    WHERE id_capitulo_libro = $_POST[id_capitulo_libro] ");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['editar_sub_titulo'])){
        mysqli_query($con,"UPDATE `sub_titulos` 
                        SET `sub_titulo`= '$_POST[sub_titulo]'
                        WHERE id_sub_titulo =  $_POST[id_sub_titulo]");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['editar_detalle_sub_titulo'])){
        mysqli_query($con,"UPDATE `detalles_sub_titulos` 
                    SET `detalle_sub_titulo`= '$_POST[detalle_sub_titulo]'
                    WHERE id_detalle_sub_titulo = $_POST[id_detalle_sub_titulo]");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    //BOTON BORRAR
    if(isset($_POST['delete_capitulo'])){
        mysqli_query($con,"DELETE FROM `capitulos_libros` WHERE id_capitulo_libro = $_POST[id_capitulo_libro]");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['delete_sub_titulo'])){
        mysqli_query($con,"DELETE FROM `sub_titulos` WHERE id_sub_titulo = $_POST[id_sub_titulo]");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    if(isset($_POST['delete_parrafo'])){
        mysqli_query($con,"DELETE FROM `detalles_sub_titulos` WHERE id_detalle_sub_titulo = $_POST[id_detalle_sub_titulo]");
        echo "<script>location.href='ver_libro_editar.php?n=$_GET[n]'</script>";
    }
    
    
?>
</body>
</html>