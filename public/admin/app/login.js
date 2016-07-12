$(function () {

    toastr.options = {
        "type": "info",
        // "positionClass": "toast-bottom",
        "progressBar": true,
        "closeButton": true,
        "preventDuplicates": true,
        "newestOnTop": false,
        "timeout": 10000
    };

    var $form = $('#admin-login'),
        storage = window.localStorage;

    // removendo token atual, caso exista
    delete storage['token'];

    $form.validate({
        errorPlacement: function (error, element) {
        },
        onfocusout: false,
        errorClass: "has-error",
        rules: {
            'username': {
                required: true
            },
            'password': {
                required: true
            }
        },
        messages: {
            'username': {
                required: function () {
                    toastr['error']('Informe seu nome de usuário.');
                }
            },
            'password': {
                required: function () {
                    toastr['error']('Informe sua senha.');
                }
            }
        },
        submitHandler: function () {

            var btn = $('#login-btn'),
                btnOriginalText = btn.html(),
                btnLoadingText = 'Aguarde...';

            btn.html(btnLoadingText);

            var request = $.ajax({
                data: $form.serialize(),
                url: $form.attr('action'),
                type: $form.attr('method')
            });

            request.done(function (r) {
                var token = r.data.token;
                var setToken = $.ajax({
                    url: 'login/setToken',
                    method: $form.attr('method'),
                    dataType: 'json',
                    data: {"token": token},
                    success: function (resp) {
                        console.log(resp);
                        window.localStorage.setItem('token', token);
                        window.location = '/';
                    },
                    fail: function (err) {
                        btn.html(btnOriginalText);
                        toastr['error'](err.message);
                    }
                });
            }).fail(function (err) {
                var r = err.responseJSON;
                btn.html(btnOriginalText);
                toastr['error'](r.message);
            })
        }
    });
});
