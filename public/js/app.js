$(document).ready(function () {
    $('.blur').click(function () {
        $('.blur').css('display', 'none');
        $('.mobile-nav').css('left', -1000);
    });
    $('#openMenu').click(function () {
        $('.blur').css('display', 'block');
        $('.mobile-nav').css('display', 'block');
        $('.mobile-nav').css('left', 0);
    });
    $('#closeNoti').click(function () {
        $('#msg').css('display', 'none');
    });
});

$('.section-slide').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});
$(document).ready(function () {
    var totalSeconds = $('#time_discount').val();
    var counterElement = document.getElementById("counter");

    function updateCounter() {
        var days = Math.floor(totalSeconds / (24 * 3600));
        var hours = Math.floor((totalSeconds % (24 * 3600)) / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = Math.floor(totalSeconds % 60);

        $('#days').text(days.toString().padStart(2, '0'));
        $('#hours').text(hours.toString().padStart(2, '0'));
        $('#minutes').text(minutes.toString().padStart(2, '0'));
        $('#seconds').text(seconds.toString().padStart(2, '0'));
    }
    // Cập nhật giá trị ban đầu
    updateCounter();
    // Bắt đầu đếm ngược
    var countDown = setInterval(function () {
        totalSeconds--;
        if (totalSeconds < 0) {
            clearInterval(countDown);
        } else {
            updateCounter();
        }
    }, 1000);
});
