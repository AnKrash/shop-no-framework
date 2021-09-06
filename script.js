$("#productType").on('input', function () {
    $('div[data-product-id]').addClass("d-none");
    $('[data-product-id=' + $(this).find(":selected").val() + ']').removeClass("d-none");
});

$(document).ready(function () {
    $("#loginform").validate({
        rules: {
            sku: {
                required: true,
            },
            name: {
                required: true,
            },
            price: {
                required: true,
                number: true,
            },
            size: {
                required: true,
                number: true,
            },
            height: {
                required: true,
                number: true,
            },
            length: {
                required: true,
                number: true,
            },
            width: {
                required: true,
                number: true,
            },
            weight: {
                required: true,
                number: true,
            },
        },
        messages: {
            sku: {
                required: "Please, submit required data",
            },
            name: {
                required: "Please, submit required data",
            },
            price: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
            size: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
            height: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
            width: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
            length: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
            weight: {
                required: "Please, submit required data",
                number: "Please, provide the data of indicated type",
            },
        }
    });
});

$("#delete-product-btn").on("click", function () {
    let data = [];
    $("input:checkbox:checked").each(function () {
        data.push($(this).attr('value'));
        console.log($(this).attr('value'));
    });

    $.ajax({
        type: "POST",
        url: "/ajax.php",
        data: {ids: JSON.stringify(data)},
    }).done(function () {
        $("input:checkbox:checked").closest('.card').remove();
    });
});
$(function () {
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
    });
});