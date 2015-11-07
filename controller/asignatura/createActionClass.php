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

      $nombre = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::NOMBRE, true));
      $intesidadHoraria = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::INTESIDAD_HORARIA, true));
      $tipoAsignatura = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::TIPO_ASIGNATURDA, true));

      $data = array(
          asignaturaTableClass::INTESIDAD_HORARIA => $intesidadHoraria,
          asignaturaTableClass::NOMBRE => $nombre,
          asignaturaTableClass::TIPO_ASIGNATURDA => $tipoAsignatura
      );
      asignaturaTableClass::insert($data);
      session::getInstance()->setSuccess("Se ha insertado con exito el registro");
      log::register('Se ha creado un registro con el id: ', asignaturaTableClass::getNameTable());
      routing::getInstance()->redirect('asignatura', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
