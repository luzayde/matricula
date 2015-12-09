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

      $nombre = request::getInstance()->getPost(barrioTableClass::getNameField(barrioTableClass::NOMBRE_BARRIO, true));
      $ciudad = request::getInstance()->getPost(barrioTableClass::getNameField(barrioTableClass::ID_CIUDAD, true));

      $data = array(
          barrioTableClass::NOMBRE_BARRIO => $nombre,
          barrioTableClass::ID_CIUDAD => $ciudad
      );

      barrioTableClass::insert($data);
      
      session::getInstance()->setSuccess("El barrio se registro satisfactoriamente");
      log::register('Se inserto una ciudad ', barrioTableClass::getNameTable());
      routing::getInstance()->redirect('barrio', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
