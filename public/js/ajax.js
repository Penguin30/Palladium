$(document).ready(function(){
    $('#auth_code_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/account/auth',
            data: $('#auth_code_form').serialize(),
            success: function(result){
                if(result == -9){
                    if($('#auth_code_form div.invalid-feedback').length == 0){
                        $('#auth_code_form input[name=code]').after('<div class="invalid-feedback">Не верный код</div>');                        
                    }else{
                        $('#auth_code_form input[name=code] .invalid-feedback').css('dispaly','block');
                    }
                }else{
                    window.location.href='/account'; 
                }
            }
        });
    });
    $('.filters .inp-wp div').on('click',function(){
        if($('.filters .inp-wp input').val() !== ''){
            $.ajax({
                type: 'POST',
                url: '/vip-film/search',
                data: $('#search_form').serialize(),
                success: function(result){
                    $('.vip-films-list').empty();
                    $('.vip-films-list').append(result);
                }
            });
        }
    });
    $('#select-by').on('change',function(){
        $.ajax({
            type: 'POST',
            url: '/vip-film/search',
            data: $('#search_form').serialize(),
            success: function(result){
                $('.vip-films-list').empty();
                $('.vip-films-list').append(result);
            }
        });
    });
    $('#select-category').on('change',function(){
        $.ajax({
            type: 'POST',
            url: '/vip-film/search',
            data: $('#search_form').serialize(),
            success: function(result){
                $('.vip-films-list').empty();
                $('.vip-films-list').append(result);
            }
        });
    });
});
$('.hall-seats .seat-place').on('click',function(){
    if($(this).hasClass('chosen')){
        $('#order_seats').find('input[value="'+$(this).data('id')+'"]').remove();        
    }else{
        var input = '<input type="hidden" value='+$(this).data('id')+' name="seats[]">'
        $('#order_seats').append(input);
    }
});
$(document).ready(function(){
    var options =  {
      onComplete: function(cep) {
        $('#pay_card_form #tel').addClass('confirmed');
        $('#pay_card_form button.pay').removeAttr('disabled');
      },
      onChange: function(cep){
        if($('#pay_card_form #tel').cleanVal().length < 10){
            $('#pay_card_form #tel').addClass('declined');
            $('label[for="tel"]').addClass('declined');
            $('#pay_card_form button.pay').attr('disabled','true');
        }else{
            $('#pay_card_form #tel').removeClass('declined');
            $('label[for="tel"]').removeClass('declined');
            $('#pay_card_form button.pay').removeAttr('disabled');
            $('#pay_card_form #tel').addClass('confirmed');
            $('label[for="tel"]').addClass('confirmed');
        }
      },
      onInvalid: function(val, e, f, invalid, options){
        $('#pay_card_form #tel').addClass('declined');
        $('label[for="tel"]').addClass('declined');
      }
    };
    $('#pay_card_form #tel').mask('(000) 00 00 000', options);
    if($('#pay_card_form #tel').cleanVal().length == 10){
        $('#pay_card_form #tel').addClass('confirmed');
    }
});
$('#pay_card_form #email').on('input',function(){
    $(this).removeClass('declined');
    $('label[for="email"]').removeClass('declined');
    if($(this).val().length == 0){
        $(this).addClass('declined');
        $('label[for="email"]').addClass('declined');
    }else{
        pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(!pattern.test($(this).val())){
            $('#pay_card_form button.pay').attr('disabled','true');
            $(this).addClass('declined');
            $('label[for="email"]').addClass('declined');
        }else{
            $('#pay_card_form button.pay').removeAttr('disabled');
            $(this).addClass('confirmed');
            $('label[for="email"]').addClass('confirmed');
        }
    }
});
$(document).ready(function(){
    $('#form_pay_submit form').submit();
});
