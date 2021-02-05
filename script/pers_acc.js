// Изменение личных данных пользователя

$('#edit_person').on('click', function () {
    $('#person_data').hide();
    $('#edit_person_data').show();

});

$('#save_data').on('click', function (e) {

    e.preventDefault();
    var name = $('#username').val();
    var email = $('#email').val();

    $.ajax({
        url: 'ajax/edit_pers_data.php',
        type: 'POST',
        cache: false,
        data: {
            'username': name,
            'email': email
        },
        dataType: 'html',
        success: function (data) {
            if (data == "true") {
                location.reload();
            } else {
                $('#errorBlock').show();
                $('#errorBlock').text(data);

            }

        }
    });
});

$('#cancel_edit_data').on('click', function (e) {
    e.preventDefault();

    $('#errorBlock').hide();
    $('#username').empty();
    $('#email').empty();
    $('#edit_person_data').hide();
    $('#person_data').show();

});


// Изменение пароля пользователя

$('#edit_pass').on('click', function () {
    $('#person_data').hide();
    $('#edit_person_pass').show();

});

$('#save_pass').on('click', function (e) {

    e.preventDefault();
    var pass = $('#pass').val();
    var new_pass = $('#new_pass').val();
    var new_pass_replay = $('#new_pass_replay').val();

    $.ajax({
        url: 'ajax/edit_pers_pass.php',
        type: 'POST',
        cache: false,
        data: {
            'pass': pass,
            'new_pass': new_pass,
            'new_pass_replay': new_pass_replay
        },
        dataType: 'html',
        success: function (data) {
            if (data == "true") {
                location.reload();
            } else {
                $('#errorBlock').show();
                $('#errorBlock').text(data);

            }

        }
    });
});

$('#cancel_edit_pass').on('click', function (e) {
    e.preventDefault();

    $('#errorBlock').hide();
    $('#pass').val('');
    $('#new_pass_1').val('');
    $('#new_pass_2').val('');
    $('#edit_person_pass').hide();
    $('#person_data').show();

});
