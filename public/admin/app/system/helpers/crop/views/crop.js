/*global app, $, Marionette */
define([
    'tpl!system/helpers/crop/templates/crop.html',
    'system/helpers/crop/config/config',
    'validate',
    'stickit',
    'cropper'
], function (Template, config) {

    'use strict';

    return Marionette.ItemView.extend({
        template: Template,
        initialize: function () {
            this.model = this.model || new Backbone.Model;

            this.listenTo(this.model, 'change:width change:height change:x change:y change:rotate', function (m) {
                var crop = 'crop=' + [m.get('width'), m.get('height'), m.get('x'), m.get('y')].join(',');
                var or = 'or=' + m.get('rotate');
                var qs = [crop, or].join('&');
                this.model.set('qs', qs);
            });

        },

        onRender: function () {
            this.stickit();
            this.initCropper();
        },

        initCropper: function () {

            var $image = this.$('#c-image');
            var $previews = this.$('.preview');
            var self = this;
            this.$image = $image;

            $image.attr('src', this.model.get('imgUrl'));

            var cropperDefaults = {
                background: false,
                build: function (e) {
                    var $clone = $(this).clone();
                    $clone.css({
                        display: 'block',
                        width: '100%',
                        minWidth: 0,
                        minHeight: 0,
                        maxWidth: 'none',
                        maxHeight: 'none'
                    });
                    $previews.css({
                        width: '100%',
                        overflow: 'hidden'
                    }).html($clone);
                },
                crop: function (e) {
                    var imageData = $(this).cropper('getImageData');
                    var previewAspectRatio = e.width / e.height;

                    $previews.each(function () {
                        var $preview = $(this);
                        var previewWidth = $preview.width();
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = e.width / previewWidth;

                        $preview.height(previewHeight).find('img').css({
                            width: imageData.naturalWidth / imageScaledRatio,
                            height: imageData.naturalHeight / imageScaledRatio,
                            marginLeft: -e.x / imageScaledRatio,
                            marginTop: -e.y / imageScaledRatio
                        });
                    });

                    self.model.set(self.$image.cropper('getData'));

                },
                preview: '#c-preview'
            };

            var options = $.extend(cropperDefaults, (this.options.crop != 'undefined') ? this.options.crop : {});

            $image.cropper(options);

        },

        events: {
            'click #doneEditing': function (e) {
                e.preventDefault();
                app.vent.trigger('imageEditor:done', this.model.toJSON());
                app.vent.trigger('modal:close', {idViewClosed: this.cid});
            },

            'click [data-method]': function (e) {
                var $this = $(e.currentTarget);
                var data = $this.data();
                var $target;
                var result;

                if ($this.prop('disabled') || $this.hasClass('disabled')) {
                    return;
                }

                if (this.$image.data('cropper') && data.method) {
                    data = $.extend({}, data); // Clone a new one

                    if (typeof data.target !== 'undefined') {
                        $target = $(data.target);
                        if (typeof data.option === 'undefined') {
                            try {
                                data.option = JSON.parse($target.val());
                            } catch (e) {
                                console.log(e.message);
                            }
                        }
                    }
                    this.$image.cropper(data.method, data.option, data.secondOption);
                    this.model.set(this.$image.cropper('getData'));
                }
            }
        },

        bindings: {}

    });
});

