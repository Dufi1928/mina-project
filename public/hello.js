$(document).ready(function () {
    $('.header_burger').click(function (event) {
        $('.header_burger,.header_menu,.header_logo,.header_list').toggleClass('active');
        $('body').toggleClass('lock');
    });
});
console.log("hello");