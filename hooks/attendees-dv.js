
$j(document).ready(function () {

    //load days of event immediately
    load_event_days();

    //add toggle buttons on top
    create_toggle_buttons();

    //Apply Flat red color scheme for iCheck boxes
    addIcheck();

    //onclick radio button
    toggle_fields();

    //onload radio button, show required fields only, by default    
    load_default_fields();

    //refresh button under events tab
    setTimeout(function () {
        refresh();
    }, 300);
});

function load_default_fields() {
    //var text = $j('.form-group label').text().toLowerCase();//closest('div.form-group').show();

    $j('.toggle-data .required').parent().addClass('checked').attr('aria-checked', true);

    $j('.text-danger').closest('div.form-group').show();
    //console.log(text);
    if ($j('.form-group label').text().toLowerCase() != 'days attended') { //console.log('inside if :'+ text);
        $j('.form-group label').closest('div.form-group').hide();
    }
    //   $j(".form-group:contains('Days Attended')").show();
    // console.log('Days Attended');
    //}
}

//create toggle buttons on top
function create_toggle_buttons() {
    var html = "<div class='col-md-12 col-lg-12 toggle-data' style='text-align: center; margin: 0 20px 20px;'>\n\
                    <div style='background: beige; width: auto; padding: 10px;'><label><b>Show:   </b></label>\n\
                    \n\<label>\n\<input type='radio' value='all' name='toggle-detail-view' class='flat-red all'> All fields</label>\n\
                    <label><input type='radio' value='required' name='toggle-detail-view' class='flat-red required checked'> Required fields only</label></div></div>";

    $j('.form-horizontal').prepend(html);
}

function addIcheck() {
    //change default radio button into icheck style
    $j('input[type=radio]').addClass('flat-red');
    $j('input[type=checkbox]').addClass('flat-red');
    $j('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
}

function refresh() {
    $j('.children-tabs .glyphicon-refresh').parent().click(function () {
        load_events();
        setTimeout(function () {
            $j(this).click(function () {
                load_events();
            });
        }, 300);
    });
}

function toggle_fields() {
    $j('.iCheck-helper').click(function () {
        if ($j(this).prev('input').attr('name') == 'toggle-detail-view') {
            var val = $j(this).prev('input[name=toggle-detail-view]').val();
            if (val == 'all') {
                $j('.form-group label').closest('div.form-group').show();
            } else {
                $j('.form-group label').closest('div.form-group').hide();
                $j('.text-danger').closest('div.form-group').show();
            }
        }
    });
}

function load_event_days() {
    //var event_days = $j("#event_day options");
    var event_id = $j('input[name=event_name]').val();
    var participant_id = $j('#id').text();
    var url = "hooks/ajax.php";
    var request = $j.ajax({
        url: url,
        method: "POST",
        data: {func: "load_event_days", "event_id": event_id, "participant_id": participant_id},
        dataType: "json"
    });

    request.done(function (data) {
        //console.log(data);
        var html = '';
        for (var i = 0; i < data[0].length; ++i) {
            var check = '';
            for (var j = 0; j < data[1].length; ++j) {
                //console.log(data[0][i]+' - '+ data[1][j]); continue;
                if (data[0][i] == data[1][j]) {
                    check = 'checked';
                    break;
                }

            }

            html = html + "<input type='checkbox' name='event_day[]' value='" + data[0][i] + "' " + check + "/> " + data[0][i] + "&nbsp;&nbsp;&nbsp;&nbsp;";
            //console.log(data[0][i]);
        }

        $j('#event_day').parent().html(html);
        addIcheck();
        toggle_fields();
    });

    request.fail(function (jqXHR, textStatus) {
        console.log(jqXHR.responseText);
    });
}

//save_access_control(table_name, col_name, value, chosen_user_id, $(this));
function load_events() {
    //obj.parent().next('.loading').show();
    var url = "hooks/ajax.php";
    var request = $j.ajax({
        url: url,
        method: "POST",
        data: {func: "load_events"},
        dataType: "json"
    });

    request.done(function (data) {
        console.log(data);
        //obj.parent().next('.loading').hide();
        /*$('.' + data['message_type'] + '-message-div-modal').html(data['message']).show();
         setTimeout(function () {
         $('.' + data['message_type'] + '-message-div-modal').hide();
         }, 6000);*/
    });

    request.fail(function (jqXHR, textStatus) {
        console.log(jqXHR.responseText);
        //obj.parent().next('.loading').show();
    });
}