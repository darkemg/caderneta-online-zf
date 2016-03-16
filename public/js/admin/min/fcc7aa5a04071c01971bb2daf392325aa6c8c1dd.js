CADERNETAONLINE.Admin = {
    Index: {},
    Login: {},
    bloquearCampoForm: function (campo) {
        $(campo).prop('readonly', true);
        if ($(campo).prop('tagName') === 'BUTTON') {
            $(campo).prop('disabled', true);
        }
    },
    desbloquearCampoForm: function (campo) {
        $(campo).prop('readonly', false);
        if ($(campo).prop('tagName') === 'BUTTON') {
            $(campo).prop('disabled', false);
        }
    },
    mostrarIconeLoader: function (elemento) {
        $(elemento).
            children('.js-icon-loading').
                removeClass('hidden').
                end().
            children('.js-icon-ready').
                addClass('hidden');
    },
    ocultarIconeLoader: function (elemento) {
        $(elemento).
            children('.js-icon-loading').
            addClass('hidden').
            end().
        children('.js-icon-ready').
            removeClass('hidden');
    },
    mostrarLoaderForm: function (form) {
        $(form).
            find(':input').
                each(function () {
                    CADERNETAONLINE.Admin.bloquearCampoForm(this);
                    CADERNETAONLINE.Admin.mostrarIconeLoader(this);
                });
    },
    ocultarLoaderForm: function (form) {
        $(form).
            find(':input').
                each(function () {
                    CADERNETAONLINE.Admin.desbloquearCampoForm(this);
                    CADERNETAONLINE.Admin.ocultarIconeLoader(this);
                });
    },
    init: function () {
        "use strict";
        CADERNETAONLINE.init();
        console.log('Módulo Admin carregado.');
    },
};