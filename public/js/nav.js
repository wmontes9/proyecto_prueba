$(window).ready(function(){  
    let widht_doc = $(document).width(), 
    media_left = function(){
        return (widht_doc > 560) ? '-40em' : '-25em';
        //     return (widht_doc > 370 && widht_doc < 560) ?  : '-100%';
        // };
    };  
    
    $('aside').css({
        height:$(document).height()
    })        
    $(window, document).resize(function () {        
        $('#nav').addClass('position-relative navegador').css({left:media_left})            
        $('aside').css({
            height:$(document).height()
        });
        if( $('aside').height() < 660 ){
            $('aside').css({
                overflox:'hidden'
            });
        }
        $('#dialog').remove();                
    })
    $('#open-close-nav').click(function(){        
    
        var icon = $('#open-close-nav').children();
        
        $(icon[0]).removeClass('rotate-close rotate-open');

        if($('#nav').hasClass('navegador')){

            $('body').append('<div id="dialog" class="nav-left-dialog"></div>');

            $('#dialog').css({
                width:$(document).width(),
                height:$(document).height()
            }).animate({
                opacity: 0.7
            }, 1000);

            $('#nav').animate({
                left:"0em"
            }, 800, function(){
                $('#nav').removeClass('navegador');                
            });
            $(icon[0]).addClass('rotate-open');
        } else {
            $('#dialog').animate({
                opacity:0
            },200,function(){
                $(this).remove();
            });

            $('#nav').addClass('position-relative navegador');            

            $('#nav').animate({                        
                left:media_left()
            },800);

            $(icon[0]).addClass('rotate-close')
        }
    })
})