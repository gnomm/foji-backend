console.clear();

var el = {};

$('.placeholder').on('click', function (ev) {
    $('.placeholder').css('opacity', '0');
    $('.list__ul-hours').toggle();
});

$('.list__ul-hours a').on('click', function (ev) {
    ev.preventDefault();
    var index = $(this).parent().index();

    $('.placeholder').text( $(this).text() ).css('opacity', '1');

    console.log($('.list__ul-hours').find('li').eq(index).html());

    $('.list__ul-hours').find('li').eq(index).prependTo('.list__ul-hours');
    $('.list__ul-hours').toggle();

});


$('select').on('change', function (e) {

    // Set text on placeholder hidden element
    $('.placeholder').text(this.value);

    // Animate select width as placeholder
    $(this).animate({width: $('.placeholder').width() + 'px' });

});
