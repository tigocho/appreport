$(document).ready(function () {
  $('.select2').select2();

  $("body").on("change", ".evt-consultar-interfaz-clinica", function(e){
    swal({
      title: "Consultando",
      text: "Estamos obtieniendo la información, por favor espere...",
      buttons: false,
      dangerMode: true,
      showConfirmButton: false
    })
    var clinica_id = $(this).val();
    var url = $(this).attr("data-url-consulta") + "/" + clinica_id;
    $.ajax({
      type: "get",
      url: url,
      dataType: "json",
    })
      .done(function(resp) {
        if(resp.status_code == 200){
          console.log(resp);
          $("#tabla-interfaz-contable-clinica").html(resp.html);
          swal.close();
        } else {
        }
      })
      .fail(function(){
      });
  });

  $("body").on("click", ".evt-enviar-registros-pendientes", function(e){
    swal({
      title: "Enviar registros pendientes",
      text: "¿Está seguro de enviar los registros pendientes?",
      dangerMode: true,
      showConfirmButton: true,
      showCancelButton: true,
      confirmButtonText: 'Enviar'
    })
  })
});