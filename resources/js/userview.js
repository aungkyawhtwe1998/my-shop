window._ = require("lodash");
import Swal from "sweetalert2/dist/sweetalert2.js";

try {
    window.$ = window.jQuery = require("jquery");
    window.animate = require('animate.css');
    window.bootstrap = require('bootstrap5/dist/js/bootstrap.bundle.min');
    window.Swal = Swal;
} catch (e) {}

$(".show-sidebar-btn").click(function() {
    $(".sidebar").animate({ marginLeft: "0" });
});

$(".hide-sidebar-btn").click(function() {
    $(".sidebar").animate({
        marginLeft: "-100%"
    });
});

$(".navbar-toggler").click(function () {
    let result = $(".navbar-toggler").hasClass("collapsed");
    console.log(result);
    if (result) {
        $(".menu-icon").removeClass("fa-times").addClass("fa-bars");
    } else {
        $(".menu-icon").removeClass("fa-bars").addClass("fa-times");

    }
});

/*Btn up to top*/
$(document).ready(function () {
    $(window).scroll(function () {
        let currentPosition = $(this).scrollTop();
        //   console.log(currentPosition);
        if (currentPosition > 0) {
            $(".btn-up").removeClass("d-none");
        } else {
            $(".btn-up").addClass("d-none");
        }
    });
});
