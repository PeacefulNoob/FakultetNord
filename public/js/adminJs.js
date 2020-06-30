$(document).ready(function () {
    $("#saveVideo").css({
        display: "none",
    });
    $("#saveSliku").css({
        display: "none",
    });
    $("#saveThumb").css({
        display: "none",
    });
    $("#photoButton").click(function () {
        $("#saveSliku").css({
            display: "block",
        });

        $("#saveVideo").css({
            display: "none",
        });
        $("#saveThumb").css({
            display: "block",
        });
    });
    $("#videoButton").click(function () {
        $("#saveSliku").css({
            display: "none",
        });
        $("#saveThumb").css({
            display: "none",
        });
        $("#saveVideo").css({
            display: "block",
        });
    });
});

//preloader
//preloader
$(document).ready(function () {
    setTimeout(function () {
        $("body").addClass("loaded");
    }, 400);
});

$(document).ready(function () {
    $("form").on("submit", function () {
        $("#loader-wrapper").fadeIn();
    }); //submit
}); //document ready
