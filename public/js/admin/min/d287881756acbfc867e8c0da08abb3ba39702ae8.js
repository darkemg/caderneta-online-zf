CADERNETAONLINE.Admin.Login = (function () {
    "use strict";
    var $this = {},
        focarElemento = function () {
            $(this).
                parent().
                addClass('input-prepend-focus');
        },
        desfocarElemento = function () {
            $(this).
                parent().
                removeClass('input-prepend-focus');
        },
        login = function (form) {
            console.log($(form).attr('method'));
            $.ajax({
                accepts: {
                    json: 'application/json'
                },
                beforeSend: function () {
                    CADERNETAONLINE.Admin.mostrarLoaderForm(form);
                },
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: $(form).serialize(),
                dataType: 'json',
                complete: function () {
                    CADERNETAONLINE.Admin.ocultarLoaderForm(form);
                }
            });
            return false;
        };
    $this.init = function () {
        CADERNETAONLINE.Admin.init();
        $('#username').focus(focarElemento);
        $('#username').focusout(desfocarElemento);
        $('#password').focus(focarElemento);
        $("#password").focusout(desfocarElemento);
        $('#login').validate({
            'rules': {
                'username': {
                    'required': true
                },
                'password': {
                    'required': true
                }
            },
            'messages': {
                'username': {
                    'required': 'Preencha o nome de usuário para fazer o login'
                },
                'password': {
                    'required': 'Informe a senha para fazer o login'
                }
            },
            'onkeyup': false,
            'focusInvalid': false,
            'focusCleanup': true,
            'errorClass': 'login-validate-error',
            'submitHandler': login
        });
    };
    return $this;
}());
$(function () {
    "use strict";
    CADERNETAONLINE.Admin.Login.init();
});