
/* Owl Carousel 2 All Settings. See the bottom for how to use equal heights with matchHeight  plugin */

jQuery(document).ready(function ($) {
    var owl = $("#owl-demo-4");

    owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,

        items: 3,
        loop: true,
        center: false,
        rewind: false,

        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,

        margin: 0,
        stagePadding: 0,

        merge: false,
        mergeFit: true,
        autoWidth: false,

        startPosition: 0,
        rtl: false,

        smartSpeed: 250,
        fluidSpeed: false,
        dragEndSpeed: false,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: false,
            },
            768: {
                items: 3,
                nav: true,
                loop: false,
            },
            992: {
                items: 4,
                nav: true,
                loop: false,
            },
        },
        responsiveRefreshRate: 200,
        responsiveBaseElement: window,

        fallbackEasing: "swing",

        info: false,

        nestedItemSelector: false,
        itemElement: "div",
        stageElement: "div",

        refreshClass: "owl-refresh",
        loadedClass: "owl-loaded",
        loadingClass: "owl-loading",
        rtlClass: "owl-rtl",
        responsiveClass: "owl-responsive",
        dragClass: "owl-drag",
        itemClass: "owl-item",
        stageClass: "owl-stage",
        stageOuterClass: "owl-stage-outer",
        grabClass: "owl-grab",
        autoHeight: false,
        lazyLoad: false,
    });

    $(".next").click(function () {
        owl.trigger("owl.next");
    });
    $(".prev").click(function () {
        owl.trigger("owl.prev");
    });

    /* Equal Heights using javascript */
    // $('.latest-blog-posts .thumbnail.item').matchHeight();
});

jQuery(document).ready(function ($) {
    var owl = $("#owl-demo-5");

    owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,

        items: 3,
        loop: true,
        center: false,
        rewind: false,

        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,

        margin: 0,
        stagePadding: 0,

        merge: false,
        mergeFit: true,
        autoWidth: false,

        startPosition: 0,
        rtl: false,

        smartSpeed: 250,
        fluidSpeed: false,
        dragEndSpeed: false,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: false,
            },
            768: {
                items: 3,
                nav: true,
                loop: false,
            },
            992: {
                items: 4,
                nav: true,
                loop: false,
            },
        },
        responsiveRefreshRate: 200,
        responsiveBaseElement: window,

        fallbackEasing: "swing",

        info: false,

        nestedItemSelector: false,
        itemElement: "div",
        stageElement: "div",

        refreshClass: "owl-refresh",
        loadedClass: "owl-loaded",
        loadingClass: "owl-loading",
        rtlClass: "owl-rtl",
        responsiveClass: "owl-responsive",
        dragClass: "owl-drag",
        itemClass: "owl-item",
        stageClass: "owl-stage",
        stageOuterClass: "owl-stage-outer",
        grabClass: "owl-grab",
        autoHeight: false,
        lazyLoad: false,
    });

    $(".next").click(function () {
        owl.trigger("owl.next");
    });
    $(".prev").click(function () {
        owl.trigger("owl.prev");
    });

    /* Equal Heights using javascript */
    // $('.latest-blog-posts .thumbnail.item').matchHeight();
});


