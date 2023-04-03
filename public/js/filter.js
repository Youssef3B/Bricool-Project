const truncate = (string, limit) => {
    return string.slice(0, limit) + "...";
};

$(document).ready(function () {
    console.log("Document ready");
    $(".filter-form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var method = form.attr("method");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        var servece = $('input[name="servece"]:checked').val();
        var cities = $('select[name="cities"]').val();

        console.log(servece, cities);

        $.ajax({
            url: url,
            type: method,
            data: { _token: CSRF_TOKEN, cities: cities, servece: servece },
            success: function (data) {
                $(".services-show").empty();
                console.log(data);
                data.forEach((service) => {
                    $(".services-show").append(`<a href="/details/${
                        service.id
                    }">
                    <div class="card">
                      <div class="up d-flex">
                        <div class="left">
                            <img class="img-profile" src="/imgs/${
                                service.image_one
                            }" alt="" />
                        </div>
                        <div class="right">
                            <form action="/favorites/add" method="POST">
                                <input type="hidden" name="_token" value="${CSRF_TOKEN}" />
                                <input type="hidden" name="id_service" value="${
                                    service.id
                                }">
                                <i id="heart" class="bx bx-heart"><button id="favor" type="submit"></button></i>
                            </form>

                          <div class="d-flex mb-3">
                            <div>
                                ${
                                    service.user.image
                                        ? `<img class="img-profile" src="/imgs/${service.user.image}" alt="" />`
                                        : `<img class="img-profile" src="/imgs/default.jpg" alt="" />`
                                })

                            </div>
                            <div>
                              <a href="/profiles/${
                                  service.user.id
                              }" class="text-success">${service.user.name}</a>
                              <p class="fw-bold">${service.user.servece}</p>
                              <p class="text-secondary">${service.user.city}</p>
                            </div>
                          </div>
                          <h3 class="fw-bolder">${service.title}</h3>

                          <p>
                          ${truncate(service.description, 200)}
                          </p>
                        </div>
                      </div>
                    </div>
                </a>`);
                });
            },
        });
    });
});
