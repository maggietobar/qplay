<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:usuariolog.php");exit;
	}

    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",];

	$pNombre = "";
	$pApellido = "";
	$pMail = "";


	if ($_POST){
        $datosPost = $_POST;
		$pNombre = $_POST["nombre"];
		$pApellido = $_POST["apellido"];
		$pMail = $_POST["email"];
		//Acá vengo si me enviaron el form

		//Validar
		$errores = $validar->validarUsuario($_POST);

		// Si no hay errores....
		if (empty($errores))
		{
		    $datosPost['register'] = true;
            $usuario = new Usuario($datosPost);
			$usuario->setPassword($_POST["password"]);
            $usuario->setIdPass();
			// Guardar al usuario en un JSON
			$repositorio->getUserRepository()->guardarUsuario($usuario);
//			$usuario->guardarImagen($usuario);
			// Reenviarlo a la felicidad
			header("location:index.php");exit;
		}
	}
	// Comienzo del Header archvos css y navbar
	genHead("Registro", "Qplay", "Registrate y forma parte!");
?>

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
                                        <option value="Principiante">Principiante</option>
                                        <option value="Intermedio">Intermedio</option>
                                        <option value="Avanzado">Avanzado</option>
                                        <option value="Experto">Experto</option>
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
<?php genFooter("Registro"); ?> 
