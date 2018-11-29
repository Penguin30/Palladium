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