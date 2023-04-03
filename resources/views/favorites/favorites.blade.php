@extends('layouts.app')

@section('content')

<section class="mt-50 mb-50 favorite">
    <div class="container">
      <div class="row">
        <h2 class="text-center mb-3">   My Fav Services</h2>
        <div class="col-12">
          <div class="table-responsive">
            <table class="table shopping-summery text-center clean">
              <thead>
                <tr class="main-heading">
                  <th scope="col">Image</th>
                  <th scope="col">Freelancer</th>
                  <th scope="col">Service</th>
                  <th scope="col">Categories</th>
                  <th scope="col">City</th>
                  <th scope="col">View</th>
                  <th scope="col">Remove</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($favorites as $favorite)

                <tr>
                  <td class="image product-thumbnail">
                    <img
                      src="{{ url('imgs/'.$favorite->service->image_one) }}"
                      class="img-fluid"
                      alt="#"
                    />
                  </td>
                  <td class="product-des product-name">
                    <h5 class="product-name">
                        <a class="text-success" href="{{ route('profiles.profiles', ['id' => $favorite->service->user->id]) }}">
                            {{ $favorite->service->user->name }}
                        </a>
                    </h5>
                    <p class="font-xs">{{ $favorite->service->user->servece }}</p>

                  </td>

                  <td class="product-des product-name">
                    <h5 class="product-name">
                        <a class="text-success" href="{{ route('details.details', ['id' => $favorite->service->id]) }}">
                            {{ $favorite->service->title }}
                        </a>
                    </h5>
                    <p class="font-xs">{{ $favorite->service->description }}</p>
                </td>

                  <td>{{ $favorite->service->user->servece}}</td>

                  <td>{{ $favorite->service->user->city }}</td>
                  <td class="action" data-title="View">
                    <a class="text-success" href="{{ route('details.details', ['id' => $favorite->service->id]) }}">
                        view
                    </a>
                </td>
                  <td class="action" data-title="View">
                    <a class="text-danger" href="{{ route('deletefavorite', ['id' => $favorite->id]) }}">Delete</a>

                </td>
                </tr>
                {{-- @endforeach --}}
                {{-- {{ $services->links() }} --}}

                <tr>
                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>
@section('content')
@


@endsection
<script>
    $(document).ready(function() {
        $(document).on('click', '#heart', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function (data) {
                    // Handle success response here
                    // For example, update the heart icon to indicate whether the service is favorited or not
                    if (data.favorited) {
                        $('#heart').addClass('favorited');
                    } else {
                        $('#heart').removeClass('favorited');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response here
                    console.log(xhr.responseText);
                }
            });
        });
    });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

