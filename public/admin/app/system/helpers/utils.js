/*jslint browser: true, devel: true, nomen: true*/
/*global $, jQuery, define, app, _, require, Backbone*/

define([], function () {

    'use strict';

    return {

        updateSelect2: function (userOptions) {

            var request,
                defaults = {
                    valueProperty: 'id',
                    labelProperty: 'name',
                    resourceName: '',
                    separator: '/'
                },
                conf = $.extend(defaults, userOptions);

            request = app.dataStore.ajax({
                type: 'GET',
                url: app.config.getEndPoint(conf.resourceName),
                data: {disablePagination: true},
                token: window.localStorage.getItem('token')
            });

            $(conf.selector).select2({
                data: null
            }).empty();

            request.done(function (response) {

                var data = [{id: '', 'text': ''}];
                _.each(response.data, function (item) {

                    data.push({
                        id: this.parseItemSelect(item, conf.valueProperty),
                        text: this.parseItemSelect(item, conf.labelProperty, conf.separator)
                    });

                }, this);

                $(conf.selector).select2({
                    data: data
                });

            }.bind(this));

            return request;

        },

        parseItemSelect: function (item, property, separator) {

            var array = property.split('/');

            var array2 = [];
            var part = '';
            var result = '';

            $.each(array, function (k, v) {
                array2.push(array[k]);
            });

            $.each(array2, function (k, v) {

                //verifica se o index do array nÃ£o Ã© o primeiro
                //caso nÃ£o seja, contatena o simbolo separador na label
                if(k != 0){
                    result += ' '+separator+' ';
                }

                //cria um array, onde cada index serÃ¡ usado
                //para recuperar o valor desejado do objeto
                part = v.split('.');

                if(part.length > 1){
                    //se o array tiver mais de 1 posiÃ§Ã£o, faz a busca
                    //atÃ© chegar no valor desejado
                    var itemAux = item;
                    $.each(part, function (k, v) {
                        itemAux = itemAux[v];
                    });
                }
                else{
                    //se tiver somente uma posiÃ§Ã£o jÃ¡ recupera o valor desejado
                    itemAux = item[part];
                }

                result += itemAux;

            });

            return result;
        },

        updateCombo: function (userOptions) {

            var defaults = {
                    valueProperty: 'id',
                    labelProperty: 'name',
                    resourceName: ''
                },
                conf = $.extend(defaults, userOptions),
                request,
                compile = _.template('<option value="<%=' + conf.valueProperty + '%>"><%= ' + conf.labelProperty + ' %></option>');

            request = app.dataStore.ajax({
                type: 'GET',
                url: app.config.getEndPoint(conf.resourceName),
                data: {disablePagination: true},
                token: window.localStorage.getItem('token')
            });

            request.done(function (response) {

                if (response.status === 'success') {
                    $(conf.selector).empty();

                    var optionsData = '';

                    _.each(response.data, function (item) {
                        optionsData = optionsData + compile(item);
                    }, this);

                    $(conf.selector).append(optionsData);

                    if (typeof conf.callback === 'function') {
                        conf.callback($(conf.selector));
                    }
                }
            }.bind(this));

            return request;

        },

        validateCPF: function (strCPF) {
            var i,
                Resto,
                Soma = 0;

            strCPF = strCPF.replace(/\D/g, '');

            if (strCPF == "00000000000") return false;
            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)))
                return false;
            Soma = 0;
            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            return Resto == parseInt(strCPF.substring(10, 11));

        },

        enableCpfValidation: function () {
            var self = this;
            $.validator.addMethod("cpf", function (value, element, params) {
                return this.optional(element) || self.validateCPF(value);
            }, jQuery.validator.format("O CPF informado nÃ£o Ã© vÃ¡lido"));
        },

        validateCNPJ: function (cnpj) {

            cnpj = cnpj.replace(/[^\d]+/g, '');

            if (cnpj == '') return false;

            if (cnpj.length != 14)
                return false;

            // Elimina CNPJs invalidos conhecidos
            if (cnpj == "00000000000000" ||
                cnpj == "11111111111111" ||
                cnpj == "22222222222222" ||
                cnpj == "33333333333333" ||
                cnpj == "44444444444444" ||
                cnpj == "55555555555555" ||
                cnpj == "66666666666666" ||
                cnpj == "77777777777777" ||
                cnpj == "88888888888888" ||
                cnpj == "99999999999999")
                return false;

            // Valida DVs
            var tamanho = cnpj.length - 2,
                numeros = cnpj.substring(0, tamanho),
                digitos = cnpj.substring(tamanho),
                soma = 0,
                pos = tamanho - 7;

            for (var i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }

            var resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            if (resultado != digitos.charAt(0))
                return false;

            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            return resultado == digitos.charAt(1);

        },

        enableCnpjValidation: function () {
            var self = this;
            $.validator.addMethod("cnpj", function (value, element, params) {
                return this.optional(element) || self.validateCNPJ(value);
            }, jQuery.validator.format("O CNPJ informado nÃ£o Ã© vÃ¡lido"));
        },

        addRetina: function (e) {
            console.log('retina');
            console.log($(e.currentTarget).children());

        }


    };


});