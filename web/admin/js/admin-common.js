$(function () {

    // Datepicker
    if (0 < $('.datepicker').length) {
        $('.datepicker').datepicker(
            {'format': 'dd.mm.yyyy',
                'weekStart': 1
            }
        );
    }

    // Timepicker
    if (0 < $('.timepicker').length) {
        $('.timepicker').timepicker();
    }
    //Colorbox

    if (0 < $('.gallery-zoom').length) {
        $('.gallery-zoom').colorbox({
            rel: 'gallery',
            maxWidth: '90%',
            width: '800px'
        });
    }

    // Wysihtml5
    if (0 < $('.wysihtml5').length) {
        //$('.wysihtml5').wysihtml5();
    }

//    $('#affect_news_text').wysihtml5({
//        "blockquote": true, // Blockquote
//        "html": true, //Button which allows you to edit the generated HTML.
//         "font-styles": true, //Font styling, e.g. h1, h2, etc.
//         "emphasis": true, //Italics, bold, etc.
//         "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
//         "link": true, //Button to insert a link.
//         "image": false, //Button to insert an image.
//         "color": false //Button to change color of font
//    });

    /** общая библиотека для справочников */
    var showFatalError = function () {
        alert('Ошибка выполнения запроса!');
    };

    var doRequest = function (target, type, data, containerId, sender) {

        Pace.restart();
        Pace.track(function () {
            $.ajax({
                url: target,
                type: type,
                dataType: 'json',
                data: data,
                cache: false,
                beforeSend: function () {
                    sender && sender.attr('disabled', 'disabled');
                    Pace.restart();
                }
            }).done(function (data) {
                sender && sender.removeAttr('disabled');
                if (data.content) {
                    if (!data.error) {
                        switch (data.contentName) {
                            case 'inline': /*content for embeding*/
                                var container = $('#' + containerId);
                                container.empty().html(data.content);
                                pageUnShade();
                                bindActions(container);
                                break;
                            case 'modal': /*modal content*/
                                $('#overlay_content').empty().html(data.content);
                                //bindActions();
                                pageShade();
                                break;
                            case 'message': /*result message*/
                                pageUnShade();
                                gritter(data.content);
                        }
                    }
                } else {
//                    alert('Error: ' + data.error);
                    gritter(data.error, 'gritter-danger');
                }

                return false;
            })
                .fail(function (jqXHR, textStatus, e) {
                    sender && sender.removeAttr('disabled');
                    pageUnShade();
                    showFatalError();
                });
        });
    };


    var pageShade = function (opacity) {
//        var overlaContent = $("#overlay_content");
//        overlaContent.empty();
        $('#modal-container').modal('show');
    };

    var pageUnShade = function () {
        $('#modal-container').modal('hide');
        var overlaContent = $("#overlay_content");
        overlaContent.empty();
    };

    var gritter = function (message, class_name) {
        if (undefined == class_name)
            class_name = "gritter-success";
        $.gritter.add({
            title: '<i class="fa fa-check-circle"></i> ' + message,
            text: '',
            sticky: false,
            time: '',
            class_name: class_name
        });
    };

    $(document).on('hover', 'span[@title]', function () {
        $(this).tooltip();
    });

    commentLoginResult = function (result) {
        if (result) {
            isAuthNeed = false;
            $('#project-comment').submit();
        }
    };

    $(document).click('#overlay_shade', pageUnShade);

    $('#btn-status-filter  a').on('click', function () {
        var self = $(this),
            btnStatusFilter = $('#btn-status-filter'),
            btnStatusFilterVidget = $('#btn-status-filter .dropdown-toggle'),
            value = self.attr('data-value'),
            target = btnStatusFilter.attr('data-target'),
            containerId = 'listContainer';

        if (btnStatusFilter.attr('disabled') != 'disabled') {
            btnStatusFilter.attr('data-value', value);
            btnStatusFilterVidget.empty().html(self.html() + ' <span class="caret"></span>');

            doRequest(target, 'post', {'status': value}, containerId, btnStatusFilter);
        }
    });


    var bindActions = function (context) {

        $('.js-user-change-param', context).on('click', function (event) {
            event.preventDefault();
            var self = $(this),
                itemStatus = self.attr('data-item-status'),
                itemId = self.attr('data-item-id'),
                itemType = self.attr('data-item-type'),
                target = self.attr('data-target'),
                itemContainerId = 'directory-item-' + itemId;

            doRequest(target, 'post', {'id': itemId, 'status': itemStatus, 'type': itemType}, itemContainerId, self);
            return false;
        });
    };

    bindActions($('#main-container'));

    $('.collapse').on('show.bs.collapse', function () {
        var self = $(this),
            itemType = self.attr('data-item-type'),
            itemId = self.attr('data-item-id'),
            target = self.attr('data-target');

        var container = 't_' + itemType + itemId;

        doRequest(target, 'POST', {'type': itemType, 'id': itemId}, container, null);
    });
});

var shareWindow = '';
