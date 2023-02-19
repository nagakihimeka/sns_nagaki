//アコーディオンメニュー
$(function () {
  $('.header-btn').click(function () {
    $('ul').toggleClass('active');
    $('.header-btn1').toggleClass('header-btn3');
    $('.header-btn2').toggleClass('header-btn4');
  });
});
