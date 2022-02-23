$(document).ready(function (e) {
    $(".nav-link").click(function () {
        if ($(this).hasClass("active")) {
            return;
        }

        $(".nav-link").removeClass("active");
        $(this).addClass("active");

        var htmlLoading = "./html/" + $(this).attr("id");
        $("#loadContent").empty();
        $("#loadContent").load(htmlLoading);

        if ($(this).attr("id") == "save_cookie.html") {
            $.ajax({
                url : './php/ajax_index.php',
                type : 'post',
                data: {
                    getCookie: 1
                },
                dataType : 'text',
                success : function (result) {
                    if (result) {
                        $("input[type=radio][id=" + result + "]").prop("checked", true);
                        $('#showImage').attr('src', '../images/' + result + '.jpg');
                        if ($("#showImage").is(":hidden")) {
                            $("#showImage").show();
                        }
                    } else {
                        $("input[type=radio][name=food]").prop('checked', false);
                        $("#showImage").hide();
                    }
                }
            });
        }
    });
});
