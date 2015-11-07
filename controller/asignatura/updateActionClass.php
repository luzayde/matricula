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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::ID_ASIGNATURA, true));
        $nombre = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::NOMBRE, true));
        $intesidadHoraria = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::INTESIDAD_HORARIA, true));
        $tipoAsignatura = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::TIPO_ASIGNATURDA, true));

        $ids = array(
            asignaturaTableClass::ID_ASIGNATURA => $id
        );

        $data = array(
            asignaturaTableClass::INTESIDAD_HORARIA => $intesidadHoraria,
            asignaturaTableClass::NOMBRE => $nombre,
            asignaturaTableClass::TIPO_ASIGNATURDA => $tipoAsignatura
        );

        asignaturaTableClass::update($ids, $data);
      }
      log::register('Se ha modificado el registro: ' + $id, asignaturaTableClass::getNameTable());
      session::getInstance()->setSuccess("Se ha modificado con exito el registro");
      routing::getInstance()->redirect('asignatura', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
