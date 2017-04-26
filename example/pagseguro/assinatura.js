PagSeguroDirectPayment.setSessionId(session);

var getBrand = function () {
  var value = $('#card').val();
  if (value.length >= 6) {
    PagSeguroDirectPayment.getBrand({
      cardBin: value.substr(0, 6),
      success: function(response) {
        $('#brand').val(response.brand.name);
        console.log('success', response);
      },
      error: function(err) {
        console.log('error', err);
      },
      complete: function(response) {
        console.log('complete', response);
      }
    })
  }
}

var save = function (token) {
  var data = {
    name: $('#name').val(),
    email: $('#email').val(),
    hash: PagSeguroDirectPayment.getSenderHash(),
    phoneAreaCode: $('#phoneAreaCode').val(),
    phoneNumber: $('#phoneNumber').val(),
    cpf: $('#cpf').val(),
    token: token,
  };

  $.ajax({
    type: "POST",
    url: '/assinatura.php',
    data: data,
    success: function (response) {
      console.log('saved');
      $('body').html(response);
    }
  });
}

getBrand();

$('#card').keyup(function () {
  getBrand();
  if ($('#card').val().length == 0) {
    $('#brand').val('');
  }
});

$('#form').submit(function () {
  PagSeguroDirectPayment.createCardToken({
    cardNumber: $('#card').val(),
    brand: $('#brand').val(),
    cvv: $('#cvv').val(),
    expirationMonth: $('#month').val(),
    expirationYear: $('#year').val(),
    success: function (response) {
      console.log('token generated');
      save(response.card.token);
    }
  });
  return false;
});
