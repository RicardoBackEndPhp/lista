$(function () {

    $(window).scroll(function () {

        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
            console.log($('.card').length);
            $.post('controller.php', {action: 'more_articles', offsetCount: $('.card').length}, function (data) {

                if (data.content) {
                    $('.content').append(data.content);
                } else {

                    if (!$('.load_more').length) {
                        $('.content').append("<div class='load_more'>" +
                            "            <p>Acabou os registros!</p>" +
                            "        </div>");
                    }
                }

            }, 'json');

        }

    });
    
    $('input[name="term_search"]').on('keyup', function (e) {
        e.preventDefault();

        var form = $(this).parent('form');

        form.ajaxSubmit({
            url: 'search.php',
            data: {action: 'search_product'},
            type: 'POST',
            dataType: 'json',
            success: function (data) {

                if (data.product) {

                    $("#show-body").html(data.product);
                }

                if (data.product_clear) {
                    if ($('.j_term_content').length) {
                        $('.j_term_content').remove();
                    }
                }
            }
        });

    });


    $('body').on('click', function (e) {
        if (!$('.j_term_content').has(e.target).length) {
            $('.j_term_content').remove();
        }
    });

});