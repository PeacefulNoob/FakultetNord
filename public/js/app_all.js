AOS.init({
    offset: 120
});

//PRIKAZ SLIKE NA KLIK
let galleryImages = document.querySelectorAll(".glry-img");
let getLatestOpenedImg;
let windowWidth = window.innerWidth;

function changeIt(img) {
    let getFullImgUrl = img.getAttribute("name");
    let container = document.body;
    let newImgWindow = document.createElement("div");
    let id = img.getAttribute("data-value");
    container.appendChild(newImgWindow);
    newImgWindow.setAttribute("class", "img-window");
    newImgWindow.setAttribute("onclick", "closeImg()");

    let newImg = document.createElement("img");
    newImgWindow.appendChild(newImg);
    newImg.setAttribute("src", getFullImgUrl);
    newImg.id = "myPic";
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "post",
        url: "/views",
        data: {
            id: id
        },
        dataType: "JSON",

        success: function (data) {
            console.log(data);
        },
    });
}

function closeImg() {
    document.querySelector(".img-window").remove();
}
//Video modal
$("#modal1").on("hidden.bs.modal", function (e) {
    $("#iframeModal").attr("src", " ");
    $("body")
        .css({
            overflow: "",
            position: "",
            top: "",
        })
        .scrollTop(scrollPos);
});

/* function changeItV(video)
    { */
$("#modal1").on("show.bs.modal", function (e) {
    let getFullVideoUrl = $(e.relatedTarget).data("myvalue");
    let indexx = $(e.relatedTarget).data("index");
    scrollPos = $("body").scrollTop();
    $("body").css({
        overflow: "hidden",
        position: "fixed",
        top: -scrollPos,
    });
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "post",
        url: "/views",
        data: {
            id: indexx
        },
        dataType: "JSON",

        success: function (data) {
            console.log(data);
        },
    });
    $("#iframeModal").attr("src", getFullVideoUrl + "?autoplay=1");
});
$(document).ready(function () {
    setTimeout(function () {
        $("body").addClass("loaded");
    }, 800);
});

//KOPIRANJE BROJA
function copyToClip() {
    /* Get the text field */
    var copyText = document.getElementById("piid");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Broj kopiran: " + copyText.value);
}

$("img").bind("contextmenu", function (e) {
    return false;
});
$("video").bind("contextmenu", function (e) {
    return false;
});
//LAZY LOADER
const myLazyLoad = new LazyLoad({
    elements_selector: ".picInd",
});

//FILTER ALBUMA
filterSelection("all");

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("mojCol");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        removeClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
}

function addClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

function removeClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}


$(document).ready(function () {
    $(".cat").click(function () {
        $("#header").addClass("light");
    });
});

$(document).ready(function () {
    // Add smooth scrolling to all links
    $(".smoothscroll").on("click", function (event) {
        // Make sure this.hash has a value before overriding default behavior

        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $("html, body").animate({
                    scrollTop: $(hash).offset().top,
                },
                800,
                function () {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                    /*                     $("a").addClass("current");
                     */
                }
            );
        } // End if
    });
});

/*----------------- SMOOTH SECTION SCROLL -----------------*/
$(".ToTop").on("click", function (e) {
    $("html, body").animate({
        scrollTop: 0
    }, 800);
    $(".nav-link").removeClass("current");
    $(".home").addClass("current");
    return false;
});

$(".scrollToTop").on("click", function (e) {
    $("html, body").animate({
        scrollTop: 0
    }, 800);
    return false;
});
$(window).on("scroll", function (e) {
    if ($(this).scrollTop() < parseInt(100)) {
        $(".scrollToTop").fadeOut();
    } else {
        $(".scrollToTop").fadeIn();
    }
});
$(window).on("scroll", function (e) {
    if ($(this).scrollTop() > parseInt(50)) {
        $(".textUvod").fadeOut();
    } else {
        $(".textUvod").fadeIn();
    }
});
$(window).on("scroll", function (e) {
    if ($(this).scrollTop() < parseInt(100)) {
        $(".hamburger div").css({
            background: "white"
        });
    } else {
        $(".hamburger div").css({
            background: "black"
        });
    }
});


///////////////////////////////////////
