<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<h1>Modificar la asignatura <?php echo $objAsignatura[0]->nombre ?></h1>
<?php view::includePartial('asignatura/form', array('objTipoAsignatura' => $objTipoAsignatura, 'objAsignatura' => $objAsignatura)) ?>