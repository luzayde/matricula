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
class verActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN)) {

        $fieldsBoletin = array(
            cabeceraBoletinTableClass::ANO_LECTIVO,
            cabeceraBoletinTableClass::BOLETIN_ID,
            cabeceraBoletinTableClass::FECHA_BOLETIN,
            cabeceraBoletinTableClass::GRADO,
            cabeceraBoletinTableClass::ID_CABECERA_BOLETIN,
            cabeceraBoletinTableClass::ID_ESTUDIANTE,
            cabeceraBoletinTableClass::OBSERVACIONES,
            cabeceraBoletinTableClass::PERIODO_ACADEMICO,
            cabeceraBoletinTableClass::PROMEDIO
        );

        $whereBoletin = array(
            cabeceraBoletinTableClass::ID_CABECERA_BOLETIN => request::getInstance()->getGet(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN)
        );

        $fields = array(
            detalleBoletinTableClass::BOLETIN_ID,
            detalleBoletinTableClass::COD_MATRICULA,
            detalleBoletinTableClass::DESEMPENO,
            detalleBoletinTableClass::ID_DETALLE_BOLETIN,
            detalleBoletinTableClass::ITEM,
            detalleBoletinTableClass::NOTA
        );
        $orderBy = array(
            detalleBoletinTableClass::ID_DETALLE_BOLETIN
        );
        $where = array(
            detalleBoletinTableClass::BOLETIN_ID => request::getInstance()->getGet(cabeceraBoletinTableClass::ID_CABECERA_BOLETIN)
        );

        $this->objBoletin = cabeceraBoletinTableClass::getAll($fieldsBoletin, true, null, null, null, null, $whereBoletin);
        $this->objDetalleBoletin = detalleBoletinTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where);
        $this->defineView("ver", "boletin", session::getInstance()->getFormatOutput());
      } else {
        session::getInstance()->setSuccess("No se ha seleccionado ningun boletin");
        $this->defineView("index", "boletin", session::getInstance()->getFormatOutput());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
