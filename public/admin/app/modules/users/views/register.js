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

            this.listenTo(this.model, 'change:state', this.updateComboCity);

            this.listenTo(app.vent, 'imageEditor:done', function (e) {
                this.$('#preview-profilePicture')
                    .hide()
                    .attr('src', [e.imgUrl, e.qs].join('?'))
                    .show();
                this.model.set('profilePictureMeta', e.qs);
            });



        },

        onRender: function () {

            this.$('select').select2({
                allowClear: true,
                width: '100%',
                placeholder: "Selecione uma opção"

            });

            if (this.model.get('id')) {
                this.loadModel().done(function (r) {
                    this.init();
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

            utils.updateSelect2({
                'selector': '#roles',
                'resourceName': 'roles'
            }).done(function () {

                var arrayIds = [];

                $.each(this.model.get('roles'), function (k, v) {
                    arrayIds.push(v.id.toString());
                });

                this.model.set('roles', arrayIds);
                this.$('#roles').change();

            }.bind(this));

            utils.updateSelect2({
                'selector': '#state',
                'resourceName': 'states'
            }).done(function () {
                this.$('#states').trigger('change.select2');
                this.stickit();
            }.bind(this));
        },

        updateComboCity: function () {

            utils.updateSelect2({
                'selector': '#city',
                'resourceName': ['states', this.model.get('state'), 'cities'].join('/')
            }).done(function () {
                this.stickit();

                setTimeout(function () {
                    this.$('#city').trigger('change.select2');
                }.bind(this), 1000);

            }.bind(this));

        },

        setupValidation: function () {
            this.form = this.$('#register');
            this.form.validate(config.validation);

            // caso seja alteração, a senha é opcional
            if (this.model.get('id')) {
                this.$("#password").rules("remove", "required");
            }
        },

        loadModel: function () {

            if (this.model.get('id')) {

                return app.dataStore.ajax({
                    type: 'GET',
                    url: app.config.getEndPoint('users/' + this.model.get('id'))
                }).done(function (result) {

                    var data = result.data;
                    var profilePicture = null;

                    if (result.data.profilePicture) {
                        var fullUrl = [result.data.profilePicture.url, result.data.profilePictureMeta].join('?');
                        $('#preview-profilePicture').attr('src', fullUrl).show();
                        profilePicture = result.data.profilePicture.filePath;
                    }

                    if (result.data.city) {
                        var city = result.data.city;
                        data.state = city.stateId.toString();
                        data.cityId = city.id.toString();
                    }

                    data.profilePicture = profilePicture;
                    this.model.set(data);
                    this.stickit();

                    setTimeout(function () {
                        this.$('#state').trigger('change.select2');
                    }.bind(this), 1000);

                }.bind(this));
            }
        },

        save: function (e) {

            e && e.preventDefault();

            var requestData = this.model.toJSON(),
                endpoint = app.config.getEndPoint('users'),
                method = 'POST';

                // if(!requestData.roles.length) {
                //     requestData.roles = [''];
                // }



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
                app.vent.trigger('modal:close', {idViewClosed: this.cid});
                window.location = '#users';
            }.bind(this));
        },

        events: {
            'submit #register': 'save',
            'click #triggerCrop': function () {

            },
            'change #newProfilePicture': function (e) {

                var settings;
                var form = new FormData();

                form.append('fileType', 'profilePicture');
                form.append('file', $(e.currentTarget)[0].files[0]);

                settings = {
                    'async': true,
                    'crossDomain': true,
                    'url': app.config.getEndPoint('files/upload'),
                    'method': 'POST',
                    'dataType': 'json',
                    'headers': {
                        'accept': 'application/json',
                        'authorization': 'Bearer: ' + localStorage.getItem('token'),
                        'cache-control': 'no-cache'
                    },
                    'processData': false,
                    'contentType': false,
                    'data': form
                };

                $.ajax(settings).done(function (response) {
                    if (typeof response.data[0].filePath != 'undefined') {
                        this.model.set('profilePicture', response.data[0].filePath);
                        this.openCropper(response.data[0].url);
                    }
                }.bind(this));

            }
        },

        openCropper: function (imgUrl) {
            require(['system/helpers/crop/views/crop'], function (View) {
                var model = new Backbone.Model({'imgUrl': imgUrl});
                var cropOptions = {
                    aspectRatio: 1
                };
                var view = new View({'model': model, crop: cropOptions}),
                    modalOptions = {
                        showFooter: false,
                        title: 'Editar imagem',
                        removeExtraPanel: '.card-header',
                        customClass: 'modal-medium'
                    };
                app.commands.execute("app:show:modalView", view, modalOptions);
            });
        },


        bindings: config.bindingsCadastro

    });
});
