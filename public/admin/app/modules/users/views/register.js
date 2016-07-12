/*global Backbone, app, $, Marionette */
define([
    'tpl!modules/users/templates/register.html',
    'modules/users/config/config',
    'system/helpers/utils',
    'select2',
    'validate',
    'stickit'
], function (Template, config, utils) {

    'use strict';

    return Marionette.ItemView.extend({
        template: Template,
        initialize: function () {
            this.model = this.model || new Backbone.Model;

            this.listenTo(this.model, 'change', function (e) {
                console.log(e.toJSON());
            });

        },

        onRender: function () {

            this.$('select').select2();

            if (this.model.get('id')) {
                this.loadModel().done(function (r) {

                    $('select').select2({
                        ajax: {
                            data: function (params) {
                                var query = {
                                    search: params.term,
                                    disablePagination: true,
                                    token: window.localStorage.getItem('token')
                                };

                                return query;
                            },
                            processResults: function (r) {
                                return {
                                    results: r.data
                                };
                            },
                            url: app.config.getEndPoint('roles'),
                            delay: 250
                        }
                    });


                    // this.model.set('roles', [r.data.roles[0].id]);
                    // this.init();
                }.bind(this));
            } else {
                this.init();
            }
        },

        init: function () {
            this.updateCombos();
            this.setupValidation();
            this.stickit();
        },

        updateCombos: function () {
            utils.updateCombo({
                'selector': '#roles',
                'resourceName': 'roles',
                'callback': function ($el) {
                    // $el.select2();
                }
            });
        },

        setupValidation: function () {
            this.form = this.$('#register');
            this.form.validate(config.validation);
        },

        loadModel: function () {
            if (this.model.get('id')) {
                return app.dataStore.ajax({
                    type: 'GET',
                    url: app.config.getEndPoint('users/' + this.model.get('id'))
                }).done(function (result) {
                    this.model.set(result.data);
                    this.stickit();
                }.bind(this));
            }
        },

        save: function (e) {

            e && e.preventDefault();

            var requestData = this.model.toJSON(),
                endpoint = app.config.getEndPoint('users'),
                method = 'POST';

            if (this.model.get('id')) {
                method = 'PUT';
                endpoint += '/' + this.model.get('id');
            }

            app.dataStore.ajax({
                url: endpoint,
                data: requestData,
                type: method
            }).done(function () {
                app.utils.notify({
                    type: 'success',
                    text: 'Operação realizada com sucesso.'
                });
                window.location = '#users';
            });
        },

        events: {
            'submit #register': 'save'
        },

        bindings: config.bindingsCadastro

    });
});
