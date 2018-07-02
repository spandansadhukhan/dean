$(document).ready(function () {

    //$('.scroll-wrapper').scrollDiv();

    $('.scroll-wrapper .scroll-up')
    .css('opacity', '0')
    .hover(function () {
        $('.scroll-wrapper .scroll-block').stop().animate({
            scrollTop: '-=2000'
        }, 9000, 'linear');

    }, function () {
        $('.scroll-wrapper .scroll-block').stop();
    });
    $('.scroll-wrapper .scroll-down')
    .css('opacity', '0')
    .hover(function () {
        $('.scroll-wrapper .scroll-block').stop().animate({
            scrollTop: '+=2000'
        }, 9000, 'linear');

    }, function () {
        $('.scroll-wrapper .scroll-block').stop();
    });

    $(".scroll-wrapper ").mouseover(function () {
        $('.scroll-wrapper .scroll-up').css('opacity', '0.2');
        $('.scroll-wrapper .scroll-down').css('opacity', '0.2');
    });

    $(".scroll-wrapper ").mouseout(function () {
        $('.scroll-wrapper .scroll-up').css('opacity', '0');
        $('.scroll-wrapper .scroll-down').css('opacity', '0');
    });

    $('.scroll-wrapper .scroll-block').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        } else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });
    
    
    
    
    
    
     $('.scroll-wrapper1 .scroll-up')
    .css('opacity', '0')
    .hover(function () {
        $('.scroll-wrapper1 .scroll-block').stop().animate({
            scrollTop: '-=2000'
        }, 9000, 'linear');

    }, function () {
        $('.scroll-wrapper1 .scroll-block').stop();
    });
    $('.scroll-wrapper1 .scroll-down')
    .css('opacity', '0')
    .hover(function () {
        $('.scroll-wrapper1 .scroll-block').stop().animate({
            scrollTop: '+=2000'
        }, 9000, 'linear');

    }, function () {
        $('.scroll-wrapper1 .scroll-block').stop();
    });

    $(".scroll-wrapper1 ").mouseover(function () {
        $('.scroll-wrapper1 .scroll-up').css('opacity', '0.2');
        $('.scroll-wrapper1 .scroll-down').css('opacity', '0.2');
    });

    $(".scroll-wrapper ").mouseout(function () {
        $('.scroll-wrapper .scroll-up').css('opacity', '0');
        $('.scroll-wrapper .scroll-down').css('opacity', '0');
    });

    $('.scroll-wrapper1 .scroll-block').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        } else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });
});

