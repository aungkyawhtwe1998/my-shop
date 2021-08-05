
//detect scroll height
$(document).ready(function () {
  let screenHeight = $(window).height();
  // console.log(screenHeight);
  $(window).scroll(function () {
    let currentPosition = $(this).scrollTop();
    // console.log(currentPosition);
    if (currentPosition > screenHeight -300) {
      $(".site-nav").addClass("site-nav-scroll");
    } else {
      $(".site-nav").removeClass("site-nav-scroll");
      setActive("home");
    }
  });
});


// $(".nav-link").click(function () {
//   $(".nav-link").removeClass("current-section");
//   $(this).addClass("current-section");
//   $(".navbar-collapse").removeClass("show");
//   $(".menu-icon").removeClass("fa-times").addClass("fa-bars");
// });

//nav button icon change
$(".navbar-toggler").click(function () {
  let result = $(".navbar-collapse").hasClass("show");
  console.log(result);
  if (result) {
    $(".menu-icon").removeClass("fa-times").addClass("fa-bars");
  } else {
    $(".menu-icon").removeClass("fa-bars").addClass("fa-times");

  }
});

function setActive(current) {
  //   console.log(current);
  $(".nav-link").removeClass("current-section");
  //jquery attribute selector
  $(`.nav-link[href='#${current}']`).addClass("current-section");
}

function navScroll() {
  let currentSection = $("section[id]");
  // console.log(currentSection);
  currentSection.waypoint(
    function (direction) {
      if (direction == "down") {
        let currentSectionId = $(this.element).attr("id");
        console.log("currentSectionId: ", currentSectionId);
        setActive(currentSectionId);
      }
    },
    { offset: "150px" }
  );

  currentSection.waypoint(
    function (direction) {
      if (direction == "up") {
        let currentSectionId = $(this.element).attr("id");
        console.log("currentSectionId: ", currentSectionId);
        setActive(currentSectionId);
      }
    },
    { offset: "-10px" }
  );
}
navScroll();

 $(document).ready(function () {
  new WOW().init();
});

//slick slider
$(".slide").slick({
  arrows: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(window).on("load", function () {
  $(".loader-container").fadeOut(100, function () {
    $(this).remove();
  });
});
