function get_users() {
    $.getJSON("get_users.php", function (data) {
        $.each(data, function (key, val) {
            $("#usuarios").append("<p>\n\
                <li class='collection-item'><input name='regIds[]' type='checkbox' class='filled-in' value='" + val.token + "' id='" + val.token + "'/> \n\
                <label for='" + val.token + "'>" + val.username + "</label></li>\n\
                </p>\n\
            ");
        });
    });
}

function send_msg() {

    var formData = {
        'regIds'                  : $("input[name='regIds[]']:checked").map(function(){
            return $(this).val();
        }).get(),
        'message_type'            : $('#message_type').val(),
        'time_to_live'            : $('#time_to_live').val(),
        'collapse_key'            : $('#collapse_key').val(),
        'click_action'            : $('#click_action').val(),
        'tag'                     : $('#tag').val(),
        'title'                   : $('#title').val(),
        'body'                    : $('#body').val(),
        'icon'                    : $('#icon').find('option:selected').val(),
        'color'                   : $('#color').find('option:selected').val(),
        'extras'                  : $('#extras').val(),
        'delay_while_idle'        : $('#delay_while_idle').is(":checked"),
        'restricted_package_name' : $('#restricted_package_name').val()
    };

    $.ajax({
        type        : "POST",
        data        : formData,
        url         : "send_message.php",
        dataType    : 'json',
        encode      : true,
        success     : function(returnData) {
            $('body').append(Materialize.toast(returnData.response, 4000));
            $("#answer").html(returnData.json);
        }
        });
}


$(function () {
    get_users();

    $(document).ready(function () {
        $('select').material_select();
    });

    $('#message_type').change(function() {
        $('#title, #body, #icon, #click_action, #tag, #color').prop('disabled', (this.value === 'data'));
        $('select').material_select();
    })
});