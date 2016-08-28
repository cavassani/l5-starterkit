define([], function () {

    return {
        bindingsCadastro: {
            '#name': 'name',
            '#email': 'email',
            '#password': 'password',
            '#roles': 'roles',
            '#profilePicture': 'profilePicture',
            '#state': 'state',
            '#city': 'cityId'
        },
        validation: {
            errorPlacement: function (error, element) {
            },
            highlight: function (item) {
                var $item = $(item);
                if ($item.hasClass('select2')) {
                    $item.siblings('.select2').find('.selection > span').addClass('error');
                } else {
                    $item.addClass('error');
                }

            },
            unhighlight: function(element, errorClass) {

                var $element = $(element);
                if ($element.hasClass('select2')) {
                    console.log($element.siblings('.select2').find('.selection > span').removeClass('error'));//.removeClass('error');
                    console.log('gotcha!');
                }

            },
            onfocusout: false,

            rules: {
                'name': {required: true},
                'email': {required: true, email: true},
                'roles': {required: true},
                'state': {required: true},
                'city': {required: true},
                'password': {required: true}
            },
            messages: {
                'name': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'O campo Nome é obrigatório'
                        });
                    }
                },
                'email': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'O campo Email  é obrigatório'
                        });
                    }
                },
                'roles': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'Selecione um cargo'
                        });
                    }
                },
                'state': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'Selecione um Estado'
                        });
                    }
                },
                'city': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'Selecione uma Cidade'
                        });
                    }
                },
                'password': {
                    required: function () {
                        app.utils.notify({
                            type: 'error',
                            title: '!',
                            text: 'O campo Senha é obrigatório'
                        });
                    }
                }
            }

        }
    };

});