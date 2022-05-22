$(function () {
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
    // Card Progress Controller
    $.cardProgress = function (card) {
        var me = $(card);
        me.addClass('card-progress');
    }

    $.cardProgressDismiss = function (card, dismissed) {
        var me = $(card);
        me.removeClass('card-progress');
        me.find('.card-progress-dismiss').remove();
        if (dismissed)
            dismissed.call(this, me);
    }

    $(".select2").select2({
        placeholder: "Select a Destination"
    });

    $(document).on("select2:open", () => {
        document.querySelector(".select2-container--open .select2-search__field").focus()
    });

    $.loaderOn = function () {
        document.getElementById("overlay").style.display = "flex";
    }

    $.loaderOff = function () {
        document.getElementById("overlay").style.display = "none";
    }

    $('.star-testimony').rating({
        theme: 'krajee-fas',
        containerClass: 'is-star',
        displayOnly: true,
        step: 0.5,
        showCaption: false
    });

    var start = new Date();
    var startDate = new Date();
    $('.checkin_date').datepicker({
        startDate: start,
        format: 'dd-mm-yyyy',
        autoclose: true
    }).on('changeDate', function (selected) {
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.checkout_date').val('');
        $('.checkout_date').datepicker('setStartDate', startDate);
    });
    $('.checkout_date').datepicker({
        weekStart: 1,
        startDate: startDate,
        format: 'dd-mm-yyyy',
        autoclose: true
    });

    var carousel = function () {
        $(".details__pic__slider").owlCarousel({
            center: true,
            loop: true,
            items: 1,
            margin: 20,
            stagePadding: 0,
            nav: true,
            smartSpeed: 900,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        $('.carousel-testimony').owlCarousel({
            center: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            loop: true,
            items: 1,
            margin: 30,
            stagePadding: 0,
            nav: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.carousel-destination').owlCarousel({
            center: false,
            loop: true,
            items: 1,
            margin: 30,
            stagePadding: 0,
            nav: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

    };
    carousel();
});
