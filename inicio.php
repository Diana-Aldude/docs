<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
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
<div class="container-fluid">
    <?php
    $sql1=mysqli_query($con,"SELECT `id_libro`, `titulo_libro`, `autor`, `fecha_creacion` FROM libros");
    while($row1=mysqli_fetch_array($sql1)){
    ?> 
    <a href='ver_libro.php?n=<?=$row1['id_libro']?>'>
    <div class='row' style='border:solid 1px black; background:yellow;margin-top:10px'>
            <div class='col-2 col-lg-1'>
	        <img src='https://www.crisol.com.pe/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/c/a/caballero-carmelo-9786123050566-libro-ca01.jpg' width='100%'>
	    </div>
	    <div class='col-10 col-lg-11'>
	        <?=utf8_encode($row1['titulo_libro'])?>
	    </div>
    </div>
    </a>
    <?php
    }
    ?>
</div>

</body>
</html>