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
class createDetalleActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasPost(detalleBoletinTableClass::getNameField(detalleBoletinTableClass::BOLETIN_ID, true))) {
        $boletinId = request::getInstance()->getPost(detalleBoletinTableClass::getNameField
                (detalleBoletinTableClass::BOLETIN_ID, true));
        $item = request::getInstance()->getPost(detalleBoletinTableClass::getNameField
                (detalleBoletinTableClass::ITEM, true));
        $matricula = request::getInstance()->getPost(detalleBoletinTableClass::getNameField
                (detalleBoletinTableClass::COD_MATRICULA, true));
        $nota = request::getInstance()->getPost(detalleBoletinTableClass::getNameField
                (detalleBoletinTableClass::NOTA, true));
        $desempeno = request::getInstance()->getPost(detalleBoletinTableClass::getNameField
                (detalleBoletinTableClass::DESEMPENO, true));

        $data = array(
          detalleBoletinTableClass::BOLETIN_ID => $boletinId,
          detalleBoletinTableClass::ITEM => $item,
          detalleBoletinTableClass::COD_MATRICULA => $matricula,
          detalleBoletinTableClass::NOTA => $nota,
          detalleBoletinTableClass::DESEMPENO => $desempeno
        );
        detalleBoletinTableClass::insert($data);
        session::getInstance()->setSuccess("Se ha insertado con exito el registro");
        log::register('Se ha creado un registro con el id: ', detalleBoletinTableClass::getNameTable());
        routing::getInstance()->redirect('boletin', 'ver', array(detalleBoletinTableClass::ID_DETALLE_BOLETIN => $boletinId));
      } else {
        session::getInstance()->setError("Hubo un problema al insertar el registro");
        log::register('Hubo un problema al creaar el detalle del boletin', cabeceraBoletinTableClass::getNameTable());
        routing::getInstance()->redirect('boletin', 'index');
      }
//      $fecha = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::FECHA_BOLETIN, true));
//      $estudiante = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::ID_ESTUDIANTE, true));
//      $grado = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::GRADO, true));
//      $anoLectivo = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::ANO_LECTIVO, true));
//      $periodo = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::PERIODO_ACADEMICO, true));
//      $observaciones = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::OBSERVACIONES, true));
//      $promedio = request::getInstance()->getPost(cabeceraBoletinTableClass::getNameField
//                      (cabeceraBoletinTableClass::PROMEDIO, true));
//
//      $data = array(
//          cabeceraBoletinTableClass::FECHA_BOLETIN => $fecha,
//          cabeceraBoletinTableClass::ID_ESTUDIANTE => $estudiante,
//          cabeceraBoletinTableClass::GRADO => $grado,
//          cabeceraBoletinTableClass::ANO_LECTIVO => $anoLectivo,
//          cabeceraBoletinTableClass::PERIODO_ACADEMICO => $periodo,
//          cabeceraBoletinTableClass::OBSERVACIONES => $observaciones,
//          cabeceraBoletinTableClass::PROMEDIO => $promedio
//      );
//      cabeceraBoletinTableClass::insert($data);
//      session::getInstance()->setSuccess("Se ha insertado con exito el registro");
//      log::register('Se ha creado un registro con el id: ', cabeceraBoletinTableClass::getNameTable());
//      routing::getInstance()->redirect('boletin', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
