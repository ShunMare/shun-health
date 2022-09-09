$(function(){
  var isError;
  $('#exampleModal').on('show.bs.modal', function () {
    isError = false;
  });
  $('#exampleModal').on('hide.bs.modal', function () {
    $('body').css('overflow', '');
    $('body').removeAttr('style');
  });
  $('#exampleModal').on('hidden.bs.modal', function () {
    $('body').css('overflow', '');
    $('body').removeAttr('style');
  });
  $('#enterSubmit').on('click', function () {
    isError = false;
    checkUserHeight();
    checkUserWeight();
    if(!isError){
      $('.modal').modal('hide');
    }  
  });
  $('#userHeight').blur(function () { 
    checkUserHeight();
  });
  $('#userWeight').blur(function () { 
    checkUserWeight();
  });

  function checkUserHeight(){
    if ($('#userHeight').val() == '') {
      $('#userHeight').removeClass('is-valid');
      $('#userHeight').addClass('is-invalid');
      isError = true;
    }else{
      $('#userHeight').addClass('is-valid');
      $('#userHeight').removeClass('is-invalid');
    }
  };
  function checkUserWeight(){
    if ($('#userWeight').val() == '') {
      $('#userWeight').removeClass('is-valid');
      $('#userWeight').addClass('is-invalid');
      isError = true;
    }else{
      $('#userWeight').addClass('is-valid');
      $('#userWeight').removeClass('is-invalid');
    }
  };
});