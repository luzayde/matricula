<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<h1>Crear ciudad</h1>
<?php  view::includePartial('barrio/form', array('objCiudad' => $objCiudad)) ?>
