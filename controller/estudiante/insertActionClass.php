<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fieldsCiudad = array(
          ciudadTableClass::ID_CIUDAD,
          ciudadTableClass::NOMBRE_CIUDAD
      );
      $this->objCiudad = ciudadTableClass::getAll($fieldsCiudad, true);

      $fieldsMadres = array(
          acudienteMadreTableClass::ID_ACUDIENTE,
          acudienteMadreTableClass::NOMBRE,
          acudienteMadreTableClass::APELLIDO
      );

      $this->objMadre = acudienteMadreTableClass::getAll($fieldsMadres, true);

      $fieldsPadres = array(
          acudientePadreTableClass::ID_ACUDIENTE,
          acudientePadreTableClass::NOMBRE,
          acudientePadreTableClass::APELLIDO
      );

      $this->objPadre = acudientePadreTableClass::getAll($fieldsPadres, true);

      $fieldsRh = array(
          tipoRhTableClass::ID_TIPO,
          tipoRhTableClass::DESCRIPCION
      );
      $this->objRh = tipoRhTableClass::getAll($fieldsRh, true);

      $fieldsTipoIdentificacion = array(
          tipoIdTableClass::ID_TIPO,
          tipoIdTableClass::DESCRIPCION
      );
      $this->objTipoId = tipoIdTableClass::getAll($fieldsTipoIdentificacion, true);

      $fieldsDiscapacidad = array(
          tipoDiscapacidadTableClass::ID_TIPO_DISCAPACIDAD,
          tipoDiscapacidadTableClass::DESCRIPCION
      );
      $this->objDiscapacidad = tipoDiscapacidadTableClass::getAll($fieldsDiscapacidad, false);

      $this->defineView("insert", "estudiante", session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
