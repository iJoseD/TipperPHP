<?php
    $servidor = "localhost"; $usuario = "backoffice_user"; $password = "N90#wmi8"; $basededatos = "backoffice_angeles";
    $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h4>Crear Historia Clínica</h4><hr>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Datos Básicos</h5>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label for="formGroupExampleInput" class="form-label">DNI / Cédula</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-4">
                <label for="formGroupExampleInput" class="form-label">Nombre (s)</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-4">
                <label for="formGroupExampleInput" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="formGroupExampleInput" class="form-label">Fecha registro</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="DD/MM/AAAA">
            </div>
            <div class="col-3">
                <label for="formGroupExampleInput" class="form-label">Celular</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-3">
                <label for="formGroupExampleInput" class="form-label">Ciudad de residencia</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-3">
                <label for="formGroupExampleInput" class="form-label">Proceso</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccione...</option>
                    <option value="Exorcismo">Exorcismo</option>
                    <option value="Liberación">Liberación</option>
                    <option value="Sanación y Liberación REIKI">Sanación y Liberación REIKI</option>
                    <option value="Rompimiento Ataduras Espirituales">Rompimiento Ataduras Espirituales</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="form-label">Diagnóstico Discernimiento Espiritual</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <div class="col-6">
                <label for="form-label">Causas y Síntomas</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Etapa 1: Ocultismo</h5>
        </div>
        <div class="row mt-3">
            <div class="col-12 table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th class="text-center" scope="col">Nunca</th>
                            <th class="text-center" scope="col">A veces</th>
                            <th class="text-center" scope="col">Moderadamente</th>
                            <th class="text-center" scope="col">Bastante</th>
                            <th class="text-center" scope="col">Mucho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta = "SELECT * FROM itemsOcultismo";
                            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                            while ($columna = mysqli_fetch_array( $resultado )) { ?>
                                <tr>
                                    <th scope="row"><?php echo $columna['item']; ?></th>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ocultismo<?php echo $columna['id']; ?>" value="OcultismoNunca<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ocultismo<?php echo $columna['id']; ?>" value="OcultismoAveces<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ocultismo<?php echo $columna['id']; ?>" value="OcultismoModeradamente<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ocultismo<?php echo $columna['id']; ?>" value="OcultismoBastante<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ocultismo<?php echo $columna['id']; ?>" value="OcultismoMucho<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="form-label">Otras actividades</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Etapa 2: Heridas del Alma</h5>
        </div>
        <div class="row mt-3">
            <div class="col-12 table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th class="text-center" scope="col">Seleccione</th>
                            <th class="text-center" scope="col">Nada</th>
                            <th class="text-center" scope="col">Poco</th>
                            <th class="text-center" scope="col">Normal</th>
                            <th class="text-center" scope="col">Bastante</th>
                            <th class="text-center" scope="col">Mucho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta = "SELECT * FROM itemsHeridas";
                            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                            while ($columna = mysqli_fetch_array( $resultado )) { ?>
                                <tr>
                                    <th scope="row"><?php echo $columna['item']; ?></th>
                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Seleccione...</option>
                                            <option value="Amigos">Amigos</option>
                                            <option value="Autoridades">Autoridades</option>
                                            <option value="Brujos">Brujos</option>
                                            <option value="Curas">Curas</option>
                                            <option value="Familia">Familia</option>
                                            <option value="Hermanos">Hermanos</option>
                                            <option value="Iglesia">Iglesia</option>
                                            <option value="Jefes">Jefes</option>
                                            <option value="Padres">Padres</option>
                                            <option value="Pareja">Pareja</option>
                                            <option value="Pastores">Pastores</option>
                                            <option value="Tíos">Tíos</option>
                                            <option value="Líderes">Líderes</option>
                                            <option value="Otros">Three</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heridas<?php echo $columna['id']; ?>" value="HeridasNada<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heridas<?php echo $columna['id']; ?>" value="HeridasPoco<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heridas<?php echo $columna['id']; ?>" value="HeridasNormal<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heridas<?php echo $columna['id']; ?>" value="HeridasBastante<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heridas<?php echo $columna['id']; ?>" value="HeridasMucho<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="form-label">Observaciones</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Etapa 3: Conduta moral</h5>
        </div>
        <div class="row mt-3">
            <div class="col-12 table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th class="text-center" scope="col">Nunca</th>
                            <th class="text-center" scope="col">A veces</th>
                            <th class="text-center" scope="col">Moderadamente</th>
                            <th class="text-center" scope="col">Bastante</th>
                            <th class="text-center" scope="col">Mucho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consulta = "SELECT * FROM itemsConducta";
                            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                            while ($columna = mysqli_fetch_array( $resultado )) { ?>
                                <tr>
                                    <th scope="row"><?php echo $columna['item']; ?></th>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conducta<?php echo $columna['id']; ?>" value="ConductaNunca<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conducta<?php echo $columna['id']; ?>" value="ConductaAveces<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conducta<?php echo $columna['id']; ?>" value="ConductaModeradamente<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conducta<?php echo $columna['id']; ?>" value="ConductaBastante<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conducta<?php echo $columna['id']; ?>" value="ConductaMucho<?php echo $columna['id']; ?>">
                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="form-label">Eres adicto a:</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="checkJuegos" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkJuegos">Juegos</label>

                    <input type="checkbox" class="btn-check" id="checkSexo" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkSexo">Sexo</label>

                    <input type="checkbox" class="btn-check" id="checkDrogas" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkDrogas">Drogas</label>

                    <input type="checkbox" class="btn-check" id="checkPornografia" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkPornografia">Pornografia</label>

                    <input type="checkbox" class="btn-check" id="checkMasturbacion" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkMasturbacion">Masturbación</label>

                    <input type="checkbox" class="btn-check" id="checkCulto" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkCulto">Culto al cuerpo</label>

                    <input type="checkbox" class="btn-check" id="checkComprar" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkComprar">Comprar cosas</label>

                    <input type="checkbox" class="btn-check" id="checkComidas" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkComidas">Comidas</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="form-label">Sufriste alguna vez de:</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="checkBulimia" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkBulimia">Bulimia</label>

                    <input type="checkbox" class="btn-check" id="checkAnorexia" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkAnorexia">Anorexia</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Historia Familiar</h5>
        </div>
        <div class="row mt-3">
            <div class="col-12 table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th class="text-center" scope="col">Papá</th>
                            <th class="text-center" scope="col">Mamá</th>
                            <th class="text-center" scope="col">Abuelos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">A quien te pareces fisicamente?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar1" value="FamiliarPapa1">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar1" value="FamiliarMama1">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar1" value="FamiliarAbuelos1">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">A quien te pareces emocionalmente?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar2" value="FamiliarPapa2">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar2" value="FamiliarMama2">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar2" value="FamiliarAbuelos2">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">A quien te pareces intelectualmente?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar3" value="FamiliarPapa3">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar3" value="FamiliarMama3">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familiar3" value="FamiliarAbuelos3">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="form-label">Repites alguna enfermedad? De quien?</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <div class="col-6">
                <label for="form-label">Repites actitudes violentas? De quien?</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label for="form-label">Repites vicios?</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="checkAlcohol" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkAlcohol">Alcohol</label>

                    <input type="checkbox" class="btn-check" id="checkCigarros" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkCigarros">Cigarros</label>

                    <input type="checkbox" class="btn-check" id="checkHFDrogas" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkHFDrogas">Drogas</label>

                    <input type="checkbox" class="btn-check" id="checkGula" autocomplete="off">
                    <label class="btn btn-outline-primary" for="checkGula">Gula</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Hubo suicidios o muertes tragicas en la familia? De quien?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Hubo abortos en la familia? De quien?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Fuiste hijo/a deseado/a?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Practicas algun ritual de tus padres o abuelos?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Guardas algun amuleto o regalo con alguna promesa? De quien?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Hubo deudas, escasez, miserias o limitaciones??</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Viven o vivieron en asa propia o alquilada?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Eres autosuficientes o dependiente?</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Estas listo/a para renunciar a los aspectos negativos que causaron y/o causan sufrimiento en tu historia pasada?</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccione...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>Observaciones Generales</h5>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button">Guardar</button>
        </div>
    </div>
</div>