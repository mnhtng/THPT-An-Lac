$(document).ready(function () {
    // Mobile menu close when clicking outside
    $(document).on('click', function (event) {
        var $navbar = $('.navbar-collapse');
        if (!$(event.target).closest('.navbar').length && $navbar.hasClass('show')) {
            $navbar.collapse('hide');
        }
    });

    // Close mobile menu when clicking nav links
    $('.navbar-nav .nav-link').on('click', function () {
        var $navbar = $('.navbar-collapse');
        if ($navbar.hasClass('show')) {
            $navbar.collapse('hide');
        }
    });

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function (event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Desktop dropdown hover
    function enableDropdownHover() {
        if (window.innerWidth >= 992) {
            $('.navbar .dropdown').on('mouseenter', function () {
                $(this).addClass('show');
                $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
                $(this).find('.dropdown-menu').addClass('show');
            }).on('mouseleave', function () {
                $(this).removeClass('show');
                $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
                $(this).find('.dropdown-menu').removeClass('show');
            });
        } else {
            $('.navbar .dropdown').off('mouseenter mouseleave');
        }
    }

    enableDropdownHover();
    $(window).on('resize', enableDropdownHover);

    // Mobile navbar overlay + lock body scroll
    var $overlay = $('<div class="nav-overlay"></div>');
    $('body').append($overlay);

    $('#navbarNav')
        .on('show.bs.collapse', function () {
            $('body').addClass('menu-open');
            $overlay.addClass('show');
            $('.navbar-toggler').addClass('active');
        })
        .on('shown.bs.collapse', function () {
            // ensure overlay visible
            $overlay.addClass('show');
        })
        .on('hide.bs.collapse', function () {
            $('body').removeClass('menu-open');
            $overlay.removeClass('show');
            $('.navbar-toggler').removeClass('active');
        })
        .on('hidden.bs.collapse', function () {
            $overlay.removeClass('show');
        });

    $overlay.on('click', function () {
        $('#navbarNav').collapse('hide');
    });

    // Close mobile menu when clicking on nav links (except dropdowns)
    $('.navbar-nav .nav-link:not(.dropdown-toggle)').on('click', function () {
        if (window.innerWidth < 992) {
            $('#navbarNav').collapse('hide');
        }
    });

    // Improve dropdown behavior on mobile: toggle submenu on click, not navigate
    $('.navbar .dropdown > .dropdown-toggle').on('click', function (e) {
        if (window.innerWidth < 992) {
            e.preventDefault();
            var $parent = $(this).parent();
            var $menu = $parent.find('.dropdown-menu').first();
            var isShown = $menu.hasClass('show');
            // close other open menus in mobile
            $parent.siblings('.dropdown').find('.dropdown-menu').removeClass('show');
            $parent.siblings('.dropdown').removeClass('show');
            if (isShown) {
                $parent.removeClass('show');
                $menu.removeClass('show');
            } else {
                $parent.addClass('show');
                $menu.addClass('show');
            }
        }
    });

    // Animation on scroll
    function animateOnScroll() {
        $('.quick-item, .news-item, .widget').each(function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('fade-in');
            }
        });
    }

    $(window).scroll(animateOnScroll);
    animateOnScroll();

    // Counter animation for stats
    function animateCounters() {
        $('.stat-number').each(function () {
            var $counter = $(this);
            var target = parseInt($counter.text().replace(/,/g, ''));
            var current = 0;
            var increment = target / 100;
            var timer = setInterval(function () {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                $counter.text(Math.floor(current).toLocaleString());
            }, 20);
        });
    }

    // Trigger counter animation when visible
    var counterAnimated = false;
    $(window).scroll(function () {
        var statsWidget = $('.stats-widget');
        if (statsWidget.length && !counterAnimated) {
            var elementTop = statsWidget.offset().top;
            var elementBottom = elementTop + statsWidget.outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                animateCounters();
                counterAnimated = true;
            }
        }
    });

    // Carousel auto play
    $('#heroCarousel').carousel({
        interval: 5000,
        wrap: true
    });

    // Form validation
    $('form').on('submit', function (e) {
        var isValid = true;
        var $form = $(this);

        $form.find('input[required], textarea[required], select[required]').each(function () {
            var $field = $(this);
            if (!$field.val().trim()) {
                isValid = false;
                $field.addClass('is-invalid');

                if (!$field.next('.invalid-feedback').length) {
                    $field.after('<div class="invalid-feedback">Vui lòng điền thông tin này.</div>');
                }
            } else {
                $field.removeClass('is-invalid');
                $field.next('.invalid-feedback').remove();
            }
        });

        // Email validation
        $form.find('input[type="email"]').each(function () {
            var $email = $(this);
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($email.val() && !emailPattern.test($email.val())) {
                isValid = false;
                $email.addClass('is-invalid');
                if (!$email.next('.invalid-feedback').length) {
                    $email.after('<div class="invalid-feedback">Email không hợp lệ.</div>');
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $form.find('.is-invalid').first().offset().top - 100
            }, 500);
        }
    });

    // Back to top button
    var backToTop = $('<button class="back-to-top"><i class="fas fa-chevron-up"></i></button>');
    $('body').append(backToTop);

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            backToTop.addClass('show');
        } else {
            backToTop.removeClass('show');
        }
    });

    backToTop.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });
});

// Utility functions
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function validatePhoneNumber(phone) {
    var phonePattern = /^(0|\+84)[0-9]{9,10}$/;
    return phonePattern.test(phone);
}

// Global namespace
window.ThptAnLac = {
    formatNumber: formatNumber,
    validatePhoneNumber: validatePhoneNumber
};