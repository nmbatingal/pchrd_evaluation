$(document).ready(function()
{
  //  tooltip
  // $('[data-toggle="tooltip"]').tooltip();
  $('label').tooltip({placement: 'top',trigger: 'manual'}).tooltip('show');
  
  $(".emojiRadio").on("click", function()
  {
    $(".emojiRadio").next("label").removeClass("grayscale");
    $(".emojiRadio").not(this).next("label").addClass("grayscale");
  });

  $("#evaluate").on("click", function()
  {
    if (checkAllRequiredFields()) {
      //  condition must be true
      showModal('warningModal');
    } else {
      //  condition must be false
      var no_of_questions = $("input[name='no_of_questions']").val();
      user_input = get_user_input(no_of_questions);
      submit(user_input);
    }
  });

});

var ajax_url = "ajax.php";

function submit(user_input)
{
	var request = $.ajax(
  {
    method: "POST",
    url: ajax_url,
    data:
    {
      user_inputs: JSON.stringify(user_input),
      name: $("input[name='name']").val(),
      institution: $("input[name='institution']").val(),
      session_name: $("input[name='session_name']").val()
    },
    success : function(result) {
      $('#thank_you').html('<b>' + $('#name').val() + '</b>, your response has successfully been recorded. thank you very much!');
      showModal('successModal');
    },
    error: function($XHR, textStatus, result) {
      showModal('errorModal');
      // console.log(textStatus + " Error result: " + result + " XHR: " + $XHR);
    }
  });
  request.fail(function ($XHR, textStatus) {
    showModal('errorModal');
    // console.log("Alerts Request failed: " + textStatus);
    return false;
  });
}

function get_user_input(no_of_questions)
{
  user_input = [];

  $.each($('form').serializeArray(), function() {
      user_input[this.name] = this.value;
  });

  return user_input;
}

function checkAllRequiredFields()
{
  if
  (
    $('#name').val() == '' || $('#name').val() == null ||
    $('input[name=\'50\']:checked').val() == '' || $('input[name=\'50\']:checked').val() == null ||
    $('input[name=\'51\']:checked').val() == '' || $('input[name=\'51\']:checked').val() == null ||
    $('input[name=\'52\']:checked').val() == '' || $('input[name=\'52\']:checked').val() == null ||
    $('input[name=\'53\']:checked').val() == '' || $('input[name=\'53\']:checked').val() == null ||
    $('input[name=\'54\']:checked').val() == '' || $('input[name=\'54\']:checked').val() == null ||
    $('input[name=\'55\']:checked').val() == '' || $('input[name=\'55\']:checked').val() == null
  )
  {
    return true;
  } else {
    return false;
  }
}

function showModal(id)
{
  $("#" + id).modal({
    backdrop: 'static',
    keyboard: false
  });
}