// ------------------------------------Slick----------------------------------------------

$(".slick_slide").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: '<i class="bx bx-left-arrow-alt left_arrow">',
    nextArrow: '<i class="bx bx-right-arrow-alt right_arrow">',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
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

// ------------------------------------END-Slick----------------------------------------------
// ------------------------------------Start Faq----------------------------------------------
const accordionHeaders = document.querySelectorAll(".accordion-header");

accordionHeaders.forEach((header) => {
    header.addEventListener("click", (event) => {
        const currentAccordionItem = event.currentTarget.parentNode;
        const isAccordionItemActive =
            currentAccordionItem.classList.contains("active");
        const accordionItems = document.querySelectorAll(".accordion-item");

        accordionItems.forEach((item) => {
            if (item !== currentAccordionItem) {
                item.classList.remove("active");
            }
        });

        if (!isAccordionItemActive) {
            currentAccordionItem.classList.add("active");
        }
    });
});
// ------------------------------------End Faq----------------------------------------------
// -----------------------------------Start checkbox----------------------------------------------
function handleCheckboxClick(clickedCheckbox) {
    // Get all checkboxes in the group
    var checkboxes = document.getElementsByName("choice");
    console.log(checkboxes);

    // Uncheck all checkboxes except the clicked one
    console.log(clickedCheckbox);
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] !== clickedCheckbox) {
            checkboxes[i].checked = false;
        }
    }
}
// -----------------------------------End checkbox----------------------------------------------
// -----------------------------------Gallery carousel----------------------------------------------
var slideIndex = 1;
showSlide(slideIndex);

function changeImage(n) {
    showSlide((slideIndex = n + 1));
}

function prevSlide() {
    showSlide((slideIndex -= 1));
}

function nextSlide() {
    showSlide((slideIndex += 1));
}

function showSlide(n) {
    var i;
    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByClassName("img-thumbnail");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    slides[slideIndex - 1].classList.add("active");
    dots[slideIndex - 1].classList.add("active");
}

// -----------------------------------end carousel----------------------------------------------
const heartIcons = document.querySelectorAll(".bx-heart");
heartIcons.forEach((icon) => {
    icon.addEventListener("click", addToFavorites);
});

function addToFavorites(event) {
    const serviceId = event.target.dataset.serviceId;
    const url = "/favorites/add";
    const data = { service_id: serviceId };
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": "{{ csrf_token() }}",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => console.log(data))
        .catch((error) => console.error(error));
}

// -----------------------------------comment ajax----------------------------------------------
// const commentForm = document.getElementById("comment-form");
// const commentList = document.getElementById("comment-list");

// commentForm.addEventListener("submit", function (event) {
//     event.preventDefault();
//     const formData = new FormData(commentForm);
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", commentForm.action);
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             const response = JSON.parse(xhr.responseText);
//             commentList.innerHTML = response.commentsHtml;
//             commentForm.reset();
//         } else {
//             console.log("Request failed.  Returned status of " + xhr.status);
//         }
//     };
//     xhr.send(formData);
// });

// $(document).ready(function () {
//     $("form").submit(function (e) {
//         e.preventDefault();
//         $.ajax({
//             url: $(this).attr("action"),
//             type: $(this).attr("method"),
//             data: $(this).serialize(),
//             success: function (data) {
//                 var comment =
//                     "<div class='comment'><h5>" +
//                     data.user.name +
//                     "</h5><p>" +
//                     data.description +
//                     "</p></div>";
//                 $("#comments-container").prepend(comment);
//                 $("textarea").val("");
//             },
//         });
//     });
// });

$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var method = form.attr("method");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        var description = $('textarea[name="description"]').val();

        $.ajax({
            url: url,
            type: method,
            data: { _token: CSRF_TOKEN, description: description },
            success: function (data) {
                var comment = `
                    <div class="about-seller mt-4">
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img id="profile" src="/imgs/${data.user.image}" alt="" />
                                </div>
                                <div>
                                    <p class="fw-bolder">${data.user.name}</p>
                                    <p class="text-secondary">${data.user.city}</p>
                                </div>
                            </div>
                        </div>
                        <div class="cards">
                            <p class="mt-2">${data.description}</p>
                        </div>
                    </div>
                `;
                $(".comments").prepend(comment);
                $("textarea").val("");
            },
        });
    });
});
// -------------------------------------------------------------------------------------------------------

// // handle form submission
// const form = document.querySelector("#favorite-form");
// const icon = document.querySelector("#favorite-icon");

// // Add an event listener to the form's submit event
// form.addEventListener("submit", (event) => {
//     event.preventDefault(); // Prevent the default form submission

//     // Send an AJAX request to the form's action URL with the form data
//     fetch(form.action, {
//         method: "POST",
//         body: new FormData(form),
//     })
//         .then((response) => response.json()) // Parse the response as JSON
//         .then((data) => {
//             // Update the favorite icon based on the response
//             if (data.favorited) {
//                 icon.classList.add("text-danger");
//             } else {
//                 icon.classList.remove("text-danger");
//             }
//         })
//         .catch((error) => console.error(error));
// });
