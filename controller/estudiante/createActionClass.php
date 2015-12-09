<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $nombreFoto = "No tiene foto";

      //padre
      $idPadre = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::ID_ACUDIENTE_PADRE, true));
      if (empty($idPadre)) {
        $nombrePadre = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::NOMBRE, true));
        $apellidoPadre = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::APELLIDO, true));
        $direccionPadre = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::DIRECCION, true));
        $telefonoPadre = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::TELEFONO, true));
        $telefonoPadreOficina = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::TELEFONO_OFICINA, true));
        $ocupacion = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::OCUPACION, true));
        $email = request::getInstance()->getPost(acudientePadreTableClass::getNameField(acudientePadreTableClass::EMAIL, true));
        $dataPadre = array(
            acudientePadreTableClass::NOMBRE => $nombrePadre,
            acudientePadreTableClass::APELLIDO => $apellidoPadre,
            acudientePadreTableClass::DIRECCION => $direccionPadre,
            acudientePadreTableClass::TELEFONO => $telefonoPadre,
            acudientePadreTableClass::TELEFONO_OFICINA => $telefonoPadreOficina,
            acudientePadreTableClass::OCUPACION => $ocupacion,
            acudientePadreTableClass::EMAIL => $email
        );
        acudientePadreTableClass::insert($dataPadre);
        $fieldPadre = array(acudientePadreTableClass::ID_ACUDIENTE);
        $orderbyPadre = array(acudientePadreTableClass::ID_ACUDIENTE);
        $objPadre = acudientePadreTableClass::getAll($fieldPadre, true, $orderbyPadre, "DESC", 1);
        $idPadre = $objPadre[0]->id;
      }

      //madre
      $idMadre = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::ID_ACUDIENTE_MADRE, true));
      if (empty($idMadre)) {
        $nombreMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::NOMBRE, true));
        $apellidoMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::APELLIDO, true));
        $direccionMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::DIRECCION, true));
        $telefonoMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::TELEFONO, true));
        $telefonoMadreOficina = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::TELEFONO_OFICINA, true));
        $ocupacionMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::OCUPACION, true));
        $emailMadre = request::getInstance()->getPost(acudienteMadreTableClass::getNameField(acudienteMadreTableClass::EMAIL, true));

        $dataMadre = array(
            acudienteMadreTableClass::NOMBRE => $nombreMadre,
            acudienteMadreTableClass::APELLIDO => $apellidoMadre,
            acudienteMadreTableClass::DIRECCION => $direccionMadre,
            acudienteMadreTableClass::TELEFONO => $telefonoMadre,
            acudienteMadreTableClass::TELEFONO_OFICINA => $telefonoMadreOficina,
            acudienteMadreTableClass::OCUPACION => $ocupacionMadre,
            acudienteMadreTableClass::EMAIL => $emailMadre
        );
        acudienteMadreTableClass::insert($dataMadre);
        $fieldMadre = array(acudienteMadreTableClass::ID_ACUDIENTE);
        $orderbyMadre = array(acudienteMadreTableClass::ID_ACUDIENTE);
        $objMadre = acudienteMadreTableClass::getAll($fieldMadre, true, $orderbyMadre, "DESC", 1);
        $idMadre = $objMadre[0]->id;
      }

      $foto = request::getInstance()->getFile(estudianteTableClass::getNameField(estudianteTableClass::FOTO, true));
      if ($foto["size"] > 0) {
        $tmp_name = $foto["tmp_name"];
//      $type = $foto["type"];
//      $size = $foto["size"];
        $nombreFoto = basename($foto["name"]);
//      $target_path = config::getPathAbsolute() . "web/photos/";
        copy($tmp_name, "photos/" . $nombreFoto);
      }
      $nombre = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::NOMBRE, true));
      $apellido = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::APELLIDO, true));
      $nacimiento = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::NACIMIENTO, true));
      $direccion = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::DIRECCION, true));
      $ciudad = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::CIUDAD_ID, true));
      $eps = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::EPS, true));
      $correo = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::CORREO, true));
      $rh = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::TIPO_RH, true));
      $tipoDocumento = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::TIPO_ID, true));
      $numeroIdentificacion = request::getInstance()->getPost(estudianteTableClass::getNameField(estudianteTableClass::NUMERO_IDENTIFICACION, true));

      $subir = array(
          estudianteTableClass::FOTO => $nombreFoto,
          estudianteTableClass::NOMBRE => $nombre,
          estudianteTableClass::APELLIDO => $apellido,
          estudianteTableClass::NACIMIENTO => $nacimiento,
          estudianteTableClass::DIRECCION => $direccion,
          estudianteTableClass::CIUDAD_ID => $ciudad,
          estudianteTableClass::EPS => $eps,
          estudianteTableClass::CORREO => $correo,
          estudianteTableClass::TIPO_RH => $rh,
          estudianteTableClass::TIPO_ID => $tipoDocumento,
          estudianteTableClass::NUMERO_IDENTIFICACION => $numeroIdentificacion,
          estudianteTableClass::ID_ACUDIENTE_PADRE => $idPadre,
          estudianteTableClass::ID_ACUDIENTE_MADRE => $idMadre
      );
      estudianteTableClass::insert($subir);

      session::getInstance()->setSuccess("Se ha insertado con exito el registro");
      log::register('Se ha creado un estudiante ', estudianteTableClass::getNameTable());
      routing::getInstance()->redirect('estudiante', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
