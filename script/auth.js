$('#auth_user').on('click', function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {
                    'email': email,
                    'pass': pass
                },
                dataType: 'html',
                success: function(data) {
                    if (data == "true") {
                        window.location.replace("./personal_account.php");
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);

                    }

                }
            });
        });