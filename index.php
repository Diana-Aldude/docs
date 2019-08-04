<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="http://www.cimacolegioamericano.com/uploads/1/1/4/0/114041349/s495493834850160571_p35_i1_w300.png">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Sistema generador de libros</title>
	<style>
		body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
  font:600 16px/18px 'Bookman',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	min-height:640px;
	object-fit: cover;
  	background:url(https://upload.wikimedia.org/wikipedia/commons/9/9a/Biblioteca-montserrat.jpg) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,96,221,.24),0 17px 50px 0 rgba(0,98,219,.19);
  top: 50px;
  background-size: 1000px;
  
}
.login-html{
	width:100%;
	height:100%;
  position:absolute;
	padding:90px 70px 50px 70px;
  background-image: -webkit-gradient(
  linear, left top, left bottom, from(rgba(0,87,221,0.75)),
  to(rgba(0,187,236,0.85)), color-stop(1,#0054d9)
);
    }
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
  }
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
    
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	
	margin:0 15px 10px 0;
	display:inline-block;
	
  }
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#ffff;
	border-color:#1161ee;
  
}
.login-form{
	min-height:345px;
  position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
  
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
  
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,1);
	color:black;
  
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
    }
.login-form .group .label{
	color:#ffffff;
	font-size:12px;
  
  }
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
  position:relative;
	display:inline-block;
	background:rgba(255,255,255,1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
  background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
  }
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
  }
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
  
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,1);
}
.foot-lnk{
	text-align:center;
  color:white;
}
.images{
  margin: 0 auto;
  position:relative;
  top: 90px;
}
	</style>
</head>
<div class="login-wrap">
	<div class="login-html">
    <div class="images">
  <input id="tab-1" type="radio" 
 name="tab" class="sign-in" checked><label for="tab-1" class="tab">Bienvenido a la Biblioteca APP</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Usuario</label>
					<input class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Mantener logueado </label>
				</div>
				<div class="group">
					<!--<input type="submit" class="button" value="Ingresar">-->
					<a href="lista_libros.php" class="button" style="text-align: center">Ingresar</a>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Olvidaste tu contraseña?</a>
				</div>
        </div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>  
 
