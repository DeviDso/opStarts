$(document).ready(function(){
    $(window).click(function() {
        $('#providers_sub_menu').hide();
        var menu = document.getElementById('main_menu');
        menu.style.right = '-300px';

    });
    $('#providers_top_menu').click(function(event){
        $('#providers_sub_menu').toggle();
        event.stopPropagation();
    });

    $('#main_menu').click(function(event){
        event.stopPropagation();
    });

    var subMenuState = 0;
    $('#user_options').click(function(event){
        var menu = document.getElementById('main_menu');
        menu.style.right = 0;
        event.stopPropagation();
    });
    $('#close_menu').click(function(event){
        var menu = document.getElementById('main_menu');
        menu.style.right = '-300px';
        event.stopPropagation();
    });

    $('#menu_services').click(function(){
        var subMenu = $('#sub_menu_services li');
        subMenu.toggle();
        if(subMenuState == 0)
        {
            subMenu.css('border-top', 'solid 1px #333333');
            $(this).css('padding-bottom', '5px');
            $(this).css('background', '#3a3939');
            $(this).css('border-left', 'solid 5px #8e130c');
            subMenuState = 1;
        }
        else
        {
            subMenu.css('border-top', 'none');
            $(this).css('padding-bottom', '14px');
            $(this).css('background', '#282828');
            $(this).css('border-left', 'none');
            subMenuState = 0;
        }
    });

    $('#menu_groups').click(function(){
        var subMenu = $('#sub_menu_groups li');
        subMenu.toggle();
        if(subMenuState == 0)
        {
            subMenu.css('border-top', 'solid 1px #333333');
            $(this).css('padding-bottom', '5px');
            $(this).css('background', '#3a3939');
            $(this).css('border-left', 'solid 5px #8e130c');
            subMenuState = 1;
        }
        else
        {
            subMenu.css('border-top', 'none');
            $(this).css('padding-bottom', '14px');
            $(this).css('background', '#282828');
            $(this).css('border-left', 'none');
            subMenuState = 0;
        }
    });
});