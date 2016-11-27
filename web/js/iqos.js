$(document).ready(function(){


    $('.js-popup-link').on('click', function(){
        $('.js-popup').fadeIn(300);
    });
    $('.js-popup-close').on('click', function(){
        $('.js-popup').fadeOut(200);
    });

    var bindSmAdd = function(context){
    $('.js-smadd', context).on('click', function(){
        var self = $(this),
            target = self.attr('data-target');

        newWin = window.open(target, 'Goodstarter share', 'top=200,left=400,scrollbars=1,height=' + Math.min(450, screen.availHeight) + ',width=' + Math.min(700, screen.availWidth));
        newWin.focus();
     });
    };

    var smResult = function (smResult, smResultHtml) {
        if (smResult) {
            $('#js-smcontainer').empty().html(smResultHtml);
            bindSmAdd('#js-smcontainer');
        }
//        $('#modal-container').empty().html(smResultHtml);
    };

    bindSmAdd('#js-smcontainer');




    if (!$('form').hasClass('form-correction')) {
        $('.js-reg-btn').attr('disabled', 'disabled');
    }

    $('form').submit(function(){
        $('form button').addClass('loading');
    });

    function checkInputs($this) {

        var id = $this.attr('id'),
            val = $this.val();

        switch(id)
        {
            case 'User_referrerFirstName':
                var rv_name = /^[А-яёЁ\-\s]+$/;

                if(val.length > 1 && val != '' && rv_name.test(val)) {
                    $this.removeClass('error').addClass('not_error');
                    $this.parent().next('.error-box').html('');
                    checkForm();
                }

                else if (val.length <= 1) {
                    $this.removeClass('not_error').addClass('error');
                    $this.parent().next('.error-box').html('<nobr>Заполните поле</nobr>');
                }
                else {
                    $this.parent().next('.error-box').html('<nobr>Используйте кириллицу</nobr>');
                }
                break;

            case 'User_firstName':
                var rv_name = /^[А-яёЁ\-\s]+$/;

                if(val.length > 1 && val != '' && rv_name.test(val)) {
                    $this.removeClass('error').addClass('not_error');
                    $this.parent().next('.error-box').html('');
                    checkForm();
                }

                else if (val.length <= 1) {
                    $this.removeClass('not_error').addClass('error');
                    $this.parent().next('.error-box').html('<nobr>Укажите имя</nobr>');
                }
                else {
                    $this.parent().next('.error-box').html('<nobr>Используйте кириллицу</nobr>');
                }
                break;

            case 'User_surnameName':
                var rv_lastname = /^[А-яёЁ\-\s]+$/;

                if(val.length >= 2 && val != '' && rv_lastname.test(val)) {
                    $this.removeClass('error').addClass('not_error');
                    $this.parent().next('.error-box').html('');
                    checkForm();
                }

                else if (val.length < 2) {
                    $this.removeClass('not_error').addClass('error');
                    $this.parent().next('.error-box').html('<nobr>Укажите фамилию</nobr>');
                }
                else {
                    $this.parent().next('.error-box').html('<nobr>Используйте кириллицу</nobr>');
                }
                break;

            case 'User_mobile':
                if(val.length)
                {
                    $this.removeClass('error').addClass('not_error');
                    $this.parent().next('.error-box').html('');
                    checkForm();
                }
                else
                {
                    $this.removeClass('not_error').addClass('error');
                    $this.parent().next('.error-box').html('<nobr>Укажите номер</nobr>')
                        .show();
                }
                break;

            case 'User_email':
                if(val.length)
                {
                    $this.removeClass('error').addClass('not_error');
                    $this.parent().next('.error-box').html('');
                    checkForm();
                }
                else
                {
                    $this.removeClass('not_error').addClass('error');
                    $this.parent().next('.error-box').html('<nobr>Укажите Е-mail</nobr>')
                        .show();
                }
                break;

        }

    }




    $('#User_referrerFirstName,' +
        '#User_firstName,' +
        '#User_surnameName,' +
        '#User_mobile,' +
        '#User_email').unbind().blur( function(){

        checkInputs($(this));

    });



    function checkForm() {
        if($('.not_error').length == 5 && $('#iqos_rules-confirm').prop('checked')) {
            $('.js-reg-btn').removeAttr("disabled", "disabled");
        }
    }



    $('#iqos_rules-confirm').on('change click', function(){
        if($('.not_error').length == 5 && $(this).prop('checked')) {
            $('.js-reg-btn').removeAttr("disabled");
        }
        $('.registration_error-box').html('');
        $('#iqos_rules-confirm').removeClass('error');
    });


    $('form').submit(function(){


        if ($('#iqos_rules-confirm').prop('checked')) {

            if($('.not_error').length == 5 || $('form').hasClass('form-correction')) {
                return true;
            }
            else {
                return false;

            }
        }

        else {

            $('#iqos_rules-confirm').addClass('error');
            $('.registration_error-box').html('<nobr>Необходимо согласие</nobr>');
            $('.js-reg-btn').removeClass("loading");
            return false;
        }

    });


    $(".js-phone-mask").mask("+ 7 (999) 999-9999");



});