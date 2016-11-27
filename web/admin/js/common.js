$(function () {
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
                                if (data.message)
                                    gritter(data.message, 'gritter-success');
                                break;
                            case 'modal': /*modal content*/
                                $('#overlay_content').empty().html(data.content);
                                pageShade();
                                break;
                            case 'message': /*result message*/
                                pageUnShade();
                                gritter(data.content);
                        }
                    }
                } else {
//                alert('Error: ' + data.error);
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
        if(undefined == class_name )
            class_name = "gritter-success";
        $.gritter.add({
            title: '<i class="fa fa-check-circle"></i> ' + message,
            text: '',
            sticky: false,
            time: '',
            class_name: class_name
        });
    };

    $(document).on('click', '#btn-tab-control', function () {
        var self = $(this),
            tabId = self.attr('data-tab-id')
            ;

//        $('#faqBasic'+tabId).collapse('show');
        $('#faqBasic' + tabId).collapse('toggle');

//        doRequest(self.attr('data-target-url'), 'GET', { user_event_id: directoryItemId, file_type_id: directoryItemType}, "overlay_content", self);
    });

    $(document).on('click', '#btn-edit-edit-media-item', function () {
        //pageShade(.3);
        var self = $(this),
            directoryItemId = self.attr('data-directory-item-id'),
            directoryItemType = self.attr('data-directory-item-type')
            ;

        doRequest(self.attr('data-target-url'), 'GET', { user_event_id: directoryItemId, file_type_id: directoryItemType}, "overlay_content", self);
    });

    $(document).on('click', '#btn-load-directory-item', function () {
        var self = $(this),
            directoryItemId = self.attr('data-directory-item-id'),
            directoryItemContainerId = "directory-item-" + directoryItemId;

        doRequest(self.attr('data-target'), 'GET', { directoryItemId: directoryItemId}, directoryItemContainerId, self);
        pageUnShade();
    });

    $(document).on('click', '#btn-cancel-directory-item', function () {
        pageUnShade();
    });

    $(document).on('hover', 'span[@title]', function () {
        $(this).tooltip();
    });

    $(document).on('click', '#btn-save-directory-item', function () {
        var self = $(this),
            form = self.parents('form'),
            directoryItemId = self.attr('data-directory-item-id'),
            directoryItemContainerId = "directory-item-" + directoryItemId;

        doRequest(form.attr('action'), 'POST', form.serialize(), directoryItemContainerId, self);
    });

    $(document).on('click', '#btn-send-wow', function () {
        var self = $(this),
            target = self.attr('data-target'),
            directoryItemId = self.attr('data-directory-item-id'),
            directoryItemContainerId = "directory-item-" + directoryItemId;


        doRequest(target, 'POST', { user_event_id: directoryItemId }, directoryItemContainerId, self);
    });

    $(document).on('click', '#imageView', function () {
        var self = $(this),
            target = self.attr('href');

        $('#modal-image-view-src').attr('src', target);

        $('#modal-image-view').modal({ keyboard: true });

        return false;
//        doRequest(target, 'POST', { user_event_id: directoryItemId }, directoryItemContainerId, self);
    });


    $(document).on('click', '#overlay_shade', pageUnShade);

    /* ajax file upload */
    $(document).on('click', '.uploadForm', function (event) {
        event.preventDefault();
        var self = $(this),
            form = self.parents('form'),
            target = self.attr('data-target'),
            userEventId = self.attr('data-user-event-id'),
            fileTypeId = self.attr('data-file-type-id'),

            form_data = new FormData(form[0]),
            itemContainerId = 'directory-item-' + userEventId;
        target = target + '?user_event_id=' + userEventId + '&file_type_id=' + fileTypeId;

        Pace.restart();
        Pace.track(function () {
            $.ajax({
                type: "POST",
                url: target,
                data: form_data,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    self && self.attr('disabled', 'disabled')
                }
            }).done(function (data) {
                self && self.removeAttr('disabled');
                if (data.content) {
                    if (!data.error) {
                        var container = $('#' + itemContainerId);
                        container.empty().html(data.content);
                        pageUnShade();
                        if (data.message)
                            gritter(data.message, 'gritter-success');
                        else
                            gritter('Загружено успешно!', 'gritter-success');
                    }
                } else {
                    //alert('Error: ' + data.error);
                    gritter(data.error, 'gritter-danger');
                }

                return false;
            }).fail(function (jqXHR, textStatus, e) {
                self && self.removeAttr('disabled');
                showFatalError();
            });
        });
    });

    $('#info-notification').click(function () {
        $.gritter.add({
            title: '<i class="fa fa-check-circle"></i> This is a info notification',
            text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
            sticky: false,
            time: '',
            class_name: 'gritter-success'
        });
        return false;
    });
});
