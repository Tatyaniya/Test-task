const swiper = new Swiper('.swiper', {
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 15,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    breakpoints: {
        1500: {
            slidesPerView: 1.6,
            spaceBetween: 40,
        },
      }
});

$(document).ready(function() {

    $('[data-submit]').on('click', function(e) {
        e.preventDefault();
        $(this).parent('form').submit();
    })
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );

    function valEl(el) {

        el.validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Required field',
                },
                email: {
                    required: 'Required field',
                    email: 'Invalid email format'
                },
                message: {
                    required: 'Required field',
                },
            },

            submitHandler: function(form) {
                $('#loader').fadeIn();
                var $form = $(form);

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                })
                .always(function(response) {
                    setTimeout(function() {
                        $('#loader').fadeOut();
                    }, 800);
                    setTimeout(function() {
                        $('#overlay').fadeIn();
                        $form.trigger('reset');
                    }, 1100);
                    $('#overlay').on('click', function(e) {
                        $(this).fadeOut();
                    });
                });
            }
        })
    }

    $('.submit-form').each(function() {
        valEl($(this));
    });
    
});
