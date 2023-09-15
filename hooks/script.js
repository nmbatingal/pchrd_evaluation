$(document).ready(function()
{
  //  tooltip
  // $('[data-toggle="tooltip"]').tooltip();
  $('label').tooltip({placement: 'top',trigger: 'manual'}).tooltip('show');
  
  $(".emojiRadio").on("click", function()
  {
    var id = $(this).attr("name");
    $(this).next("label").removeClass("grayscale");
    $(".radioGroup"+id).not(this).next("label").addClass("grayscale");
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
  if ($('.emojiRadio:checked').val() == '' || $('.emojiRadio:checked').val() == null) {
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