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
<div style='position:absolute;z-index:10;margin: 10px 0px 0px 20%'>
	            <a href='ver_libro_editar.php?n=<?=$_GET['n']?>' class='btn btn-warning btn-sm'> <i class="far fa-edit"></i> </a>
	        </div>
<?php
	  //CAPITULO - BASE
	  $sql1=mysqli_query($con,"SELECT `id_capitulo_libro`, `capitulo_libro`, `seccion`, `titulo` FROM `capitulos_libros` WHERE id_libro = $_GET[n]");
	  while($row1=mysqli_fetch_array($sql1)){
	  ?>

<div class="container" style='background:white;padding-top:10px; margin-bottom:30px;color:black'>
    <div class='row'>
	    <div class='col-xs-12 col-lg-12'>
	        
	        <center style='margin-top:50px;'>
	           <h5><?=$row1['capitulo_libro']?></h5>
	           <h5><?=$row1['seccion']?></h5>
    	       <h5><?=$row1['titulo']?></h5>
	        </center>
	        <hr>
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
        	            <?=$c?>. <span class='espacio'><?=$row2['sub_titulo']?></span
        	        </p>
        	        <?php
        	        //Detalles SUB TITULO
        	            $sql3=mysqli_query($con,"SELECT id_detalle_sub_titulo, `detalle_sub_titulo`, `foto` FROM detalles_sub_titulos WHERE id_sub_titulo = $row2[id_sub_titulo]
        	            and detalle_sub_titulo like '%$_GET[p]%' ");
        	            while($row3=mysqli_fetch_array($sql3)){
        	           ?>
        	           <p class='detalle_sub_titulo' style='background:yellow'>
        	            <?php
        	            if(isset($_GET['p'])){
        	                echo $_GET['p']." <a href='editar_dst.php?idp=$row3[id_detalle_sub_titulo]'>Editar Parrafo</a>";
        	            }
        	            ?>
        	        </p>
        	        <p class='detalle_sub_titulo'>
        	            <?=utf8_encode($row3['detalle_sub_titulo']);?>
        	            <?php
        	            if(isset($row3['foto'])){
        	                echo "<img src='$row3[foto]' style='width:100%;margin-top:15px'>";
        	            }
        	            ?>
        	        </p>
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

</body>
</html>