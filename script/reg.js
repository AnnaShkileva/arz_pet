$('#reg_user').on('click', function(e) {
            e.preventDefault();
            var name = $('#username').val();
            var email = $('#email').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'email': email,
                    'pass': pass
                },
                dataType: 'html',
                success: function(data) {
                    if (data == "true") {
                        window.location.replace("./authorization.php");
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);

                    }

                }
            });
        });