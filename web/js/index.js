function paginador(objeto, url) {
  window.location.href = url + '?page=' + objeto;
}
function confirmarEliminar(id) {
  var rsp = confirm("¿Esta seguro de querer eliminar el registro indicado?");
  if (rsp == true) {
    $('#idDelete').val(id);
    $('#frmDelete').submit();
  }
}

function borrarSeleccion() {
  var rsp = confirm("¿Esta seguro de querer eliminar los registros seleccionados?");
  if (rsp == true) {
    $('#frmDeleteAll').submit();
  }
}

function eliminarMasivo() {
  $('#myModalDeleteMasivo').modal('toggle');
}

function eliminar(id, variable, url) {
  $.ajax({
    url: url,
    data: variable + '=' + id,
    dataType: 'json',
    type: 'POST',
    success: function () {
      location.reload();
    },
    error: function (objeto, quepaso, otrobj) {
      alert("estas viendo esto por que algo fallo");
      alert("paso lo siguiente: " + quepaso);
    }
  });
}

$(document).ready(function () {
  $('#chkAll').click(function () {
    $('input[name="chk[]"]').each(function (index, element) {
      if ($('#chkAll').is(':checked') == true && $(element).is(':checked') == false) {
        $(element).prop('checked', true);
      } else if ($('#chkAll').is(':checked') == false && $(element).is(':checked') == true) {
        $(element).prop('checked', false);
      }
    });
  });
});


function mostrarFormMadre() {
  if (document.getElementById('formMadre').style.display === 'block') {
    document.getElementById('formMadre').style.display = 'none';
  } else {
    document.getElementById('formMadre').style.display = 'block';
  }
  if (document.getElementById('selecMadre').style.display === 'block') {
    document.getElementById('selecMadre').style.display = 'none';
  } else {
    document.getElementById('selecMadre').style.display = 'block';
  }
}

function mostrarFormPadre() {
  if (document.getElementById('formPadre').style.display === 'block') {
    document.getElementById('formPadre').style.display = 'none';
  } else {
    document.getElementById('formPadre').style.display = 'block';
  }
  if (document.getElementById('selectPadre').style.display === 'block') {
    document.getElementById('selectPadre').style.display = 'none';
  } else {
    document.getElementById('selectPadre').style.display = 'block';
  }
}

function pagidator(objeto, url){
  window.location.href = url + '?page='+ $(objeto).val();
}