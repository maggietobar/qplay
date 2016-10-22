<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:index.php");exit;
	}

    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",];

	$pNombre = "";
	$pApellido = "";
	$pMail = "";

	$sexos = ["Masculino", "Femenino", "Otro"];

	if ($_POST)
	{
		$pNombre = $_POST["nombre"];
		$pApellido = $_POST["apellido"];
		$pMail = $_POST["email"];
		//Acá vengo si me enviaron el form

		//Validar
		$errores = $validar->validarUsuario($_POST);

		// Si no hay errores....
		if (empty($errores))
		{
			$usuario = new Usuario($_POST);
			$usuario->setPassword($_POST["password"]);
			// Guardar al usuario en un JSON
			$repositorio->getUserRepository()->guardarUsuario($usuario);
//			$usuario->guardarImagen($usuario);
			// Reenviarlo a la felicidad
			header("location:index.php");exit;
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="name" content="content">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Antic|Maven+Pro|Poppins|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/homex.css" type="text/css" />
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
    <title>Register</title>
 </head>

<body>
<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- Para hacerlo fluido quitar "navbar-fixed-top" y sacar padding del body en la hoja del estilo -->

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand font-kaushan logo" href="index.php">QPlay</a>
                <p class="navbar-text font-farsan">Tu musica!</p>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="btn btn-nav" href="login.php">Conectate <i class="fa fa-link"></i></a></li>
                <li><a class="btn btn-nav" href="register.php">Registrate <i class="fa fa-book"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- FIN DEL NAVBAR Y SU CONTENIDO -->

<!-- COMIENZO DEL FORMULARIO REGISTRO Y SU CONTENIDO -->
<!-- div class="jumbotronreg" id="jumbotron" -->
    <div class="container-fluid regist">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h3 class="text-center font-comfortaa regtit">Registro</h3>
                    
                    <?php if (!empty($errores)) { ?>
		               <div class="errorph">
    			          <?php foreach ($errores as $error) { ?>
    					    <p class="errcript"><?php echo $error ?></p>
    				      <?php } ?>
    	               </div>
	    	        <?php } ?>
		    	        
        <!-- Aqui empiza el formulario -->
        <form id="formreg" class="form" action="register.php" method="post">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="erro"><p class="error" id="error-nombre"></p></div>
                    <div class="form-group sp <?php echo (isset($errores["nombre"]))? "onerrorph" : "" ?>">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" maxlength="30" value="<?php echo (isset($_POST['nombre']))? $_POST['nombre'] : "" ?>">
                    </div>    
                </div>
                
                <div class="col-xs-12 col-md-6">
                    <div class="erro"><p class="error" id="error-apellido"></p></div>
                    <div class="form-group sp <?php echo (isset($errores["apellido"]))? "onerrorph" : "" ?>">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" maxlength="30" value="<?php echo (isset($_POST['apellido']))? $_POST['apellido'] : "" ?>">
                    </div>
                </div>
            </div>

            <div class="erro"><p class="error" id="error-mail"></p></div>
            <div class="form-group <?php echo (isset($errores["email"]))? "onerrorph" : "" ?>">
                <input class="form-control" type="text" name="email" placeholder="Email" maxlength="55" value="<?php echo (isset($_POST['email']))? $_POST['email'] : "" ?>">
            </div>
            
            <div class="erro"><p class="error" id="error-pass"></p></div>
            <div class="form-group <?php echo (isset($errores["password"]))? "onerrorph" : "" ?>">
                <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" maxlength="30">
            </div>
            
            <div class="erro"><p class="error" id="error-pass2"></p></div>
            <div class="form-group <?php echo (isset($errores["password2"]))? "onerrorph" : "" ?>">
                <input type="password" name="password2" class="form-control" placeholder="Repita su contrase&ntilde;a" maxlength="30">
            </div>
            
            <div class="row">
                <div class="erro"><p class="error" id="error-fecha"></p></div>
                    <div class="form-group">
                        <p class="titulos-form">Fecha de Nacimiento</p>
                            <div class="col-md-4 col-xs-12">
                                <label for="dianac">Dia</label>
                                <select class="form-control select" name="dianac" id="dianac" value="<?php echo (isset($_POST['dianac']))? $_POST['dianac'] : "" ?>">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                    </select>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <label for="mesnac">Mes</label>
                                <select class="form-control select" name="mesnac" id="mesnac" value="<?php echo (isset($_POST['dianac']))? $_POST['dianac'] : "" ?>">
    				                <?php
    				                    $num = 1;
                                        foreach ($meses as $mes) {
    					                    echo "<option value=".$num.">".$mes."</option>";
    					                    $num++;
    				                    } 
    				                 ?> 
                                </select>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <label for="anionac">A&ntilde;o</label>
                                <input class="form-control" type="number" name="anionac" id="anionac" placeholder="A&ntilde;o" value="<?php echo (isset($_POST['anionac']))? $_POST['anionac'] : "" ?>"  min="1930" max="2016" maxlength="4">
                            </div>
                    </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <p class="titulos-form">Que bandas te gustan?</p>
                        <div class="row row-padding">
                            <div id="bandas">
                                <div class="col-xs-12 col-md-4">
                                    <input type="text" class="form-control" id="band" name="bandas[]" placeholder="Banda 1" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <button type="button" class="btn btn-banda" id="sumband"><i class="fa fa-plus-circle fa-lg"></i></button>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <p class="titulos-form">Tocas algun instrumento?</p>
                        <div class="row row-padding">
                            <div id="instrument">
                                <div class="col-md-6 col-xs-12">
                                  <input type="text" class="form-control" name="inst[]" placeholder="Instrumento 1" maxlength="30">
                                </div>
                                <div class="col-md-4 col-xs-8 instselect">
                                    <select class="form-control selcontenido" name="nivelinst[]">
                                        <option value="0">Principiante</option>
                                        <option value="1">Intermedio</option>
                                        <option value="2">Avanzado</option>
                                        <option value="3">Experto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-4">
                                <button type="button" class="btn btn-banda" id="suminst"><i class="fa fa-plus-circle fa-lg"></i></button>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary btn-registrar center-block" id="registrar" name="button">Registrarme</button>
                </div>
            </div>
        </form>

    <!-- div class="jumbotronlog" id="numUsuarios" style="display:none">
            <div class="container-fluid login">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <h4 class="text-center font-comfortaa logtit" id="h4numUsuarios">Felicitaciones, se ha registrado correctamente!!! Usted es el usuario número </h4>
                    </div>
                </div>
            </div>
        </div -->
        
            </div>
        </div>
    </div>
<!-- /div -->

<!-- COMIENZO DEL FOOTER -->
<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-12">
            <ul class="list-inline text-center">
                <li><a href="login.php" class="footlink">Conectate</a></li>
                <li><p></p></li>
                <li><a href="register.php" class="footlink">Registrate</a></li>
                <li><p></p></li>
                <li><a href="faq.php" class="footlink">Preguntas (FAQs)</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-maven footp text-center">Diseñado y desarollado por Eugenio Vorontsov - Maggie Tobar - Sebastian Crosta</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center footlog">
                <i class="fa fa-html5"></i>
                <i class="fa fa-css3"></i>
                <i class="fa fa-github"></i>
                <i class="fa fa-git-square"></i>
                <i class="fa fa-font-awesome"></i>
                <i class="fa fa-stack-overflow"></i>
                <i class="fa fa-apple"></i>
                <i class="fa fa-android"></i>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="line center-block"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="font-maven text-center footp">Copyright <i class="fa fa-copyright"></i> 2016 QPlay <i class="fa fa-registered"></i> All Rights Reserved.</p>
        </div>
    </div>
</div>
<!-- FIN DEL FOOTER -->

<!-- COMIENZO DE JAVASCRIPT PLUGINS -->
<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/botcolaps.js"></script>
<script type="text/javascript" src="js/validacion_register.js"></script>

</body>
</html>
