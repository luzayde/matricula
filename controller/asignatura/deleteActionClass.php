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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST') and request::getInstance()->isAjaxRequest()) {
        $id = request::getInstance()->getPost(asignaturaTableClass::getNameField(asignaturaTableClass::ID_ASIGNATURA, true));

        $ids = array(
            asignaturaTableClass::ID_ASIGNATURA => $id
        );
        asignaturaTableClass::delete($ids, true);
        $this->arrayAjax = array(
            'code' => 11,
            'msg' => 'La eliminacion ha sido exitosa'
        );
        log::register("Eliminar el registro con el id: " + $id, asignaturaTableClass::getNameTable());
        session::getInstance()->setSuccess("Se ha eliminado el registro con exito");
        $this->defineView('delete', 'asignatura', session::getInstance()->getFormatOutput());
      } else {
        log::register("Error en el eliminado", asignaturaTableClass::getNameTable());
        session::getInstance()->setError("intentelo mas tarde");
        routing::getInstance()->redirect('asignatura', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
