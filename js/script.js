$(function(){
  var isError;
  $('#exampleModal').on('show.bs.modal', function () {
    isError = false;
    // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
    // console.log('show');
  });
  $('#exampleModal').on('hide.bs.modal', function () {
    // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
    $('body').css('overflow', '');
    $('body').removeAttr('style');
  });
  $('#exampleModal').on('hidden.bs.modal', function () {
    // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
    $('body').css('overflow', '');
    $('body').removeAttr('style');
  });
  $('#enterSubmit').on('click', function () {
    isError = false;
    checkUserHeight();
    checkUserWeight();
    if(!isError){
      // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
      $('body').removeClass('modal-open');
      $('.modal').modal('hide');
      $('.modal-backdrop').remove();
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
      // $('#enterSubmit').removeAttr('data-bs-dismiss', 'modal');
      $('#userHeight').removeClass('is-valid');
      $('#userHeight').addClass('is-invalid');
      isError = true;
    }else{
      // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
      $('#userHeight').addClass('is-valid');
      $('#userHeight').removeClass('is-invalid');
    }
  };
  function checkUserWeight(){
    if ($('#userWeight').val() == '') {
      // $('#enterSubmit').removeAttr('data-bs-dismiss', 'modal');
      $('#userWeight').removeClass('is-valid');
      $('#userWeight').addClass('is-invalid');
      isError = true;
    }else{
      // $('#enterSubmit').attr('data-bs-dismiss', 'modal');
      $('#userWeight').addClass('is-valid');
      $('#userWeight').removeClass('is-invalid');
    }
  };

});