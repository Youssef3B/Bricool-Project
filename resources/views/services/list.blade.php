@foreach ($services as $sevice)
<a id="content" href="{{ route('details.details', ['id' => $sevice->id]) }}">
    <div class="card">
  <div class="up d-flex">
    <div class="left">
        <img class="img-profile" src="{{ url('imgs/'.$sevice->image_one) }}" alt="" />
    </div>
    <div class="right">
        <form action="{{ route('favorites.add') }}" method="POST">
            @csrf
            <input type="hidden" name="id_service" value="{{ $sevice->id }}">
            <i id="heart" class="bx bx-heart"><button id="favor" type="submit"></button></i>
            {{-- <button type="submit" class="btn btn-primary"><i id="heart" class="bx bx-heart"></i></button> --}}
        </form>

      <div class="d-flex mb-3">
        <div>
          @if (isset($sevice->user->image))
        <img class="img-profile" src="{{ url('imgs/'.$sevice->user->image) }}" alt="" />
      @else
        <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
      @endif
        </div>
        <div>
          <a href="{{ route('profiles.profiles', ['id' => $sevice->user->id]) }}" class="text-success">{{$sevice->user->name}}</a>
          <p class="fw-bold">{{ $sevice->user->servece }}</p>
          <p class="text-secondary">{{ $sevice->user->city }}</p>
        </div>
      </div>
      <h3 class="fw-bolder">{{$sevice->title  }}</h3>

      <p>
        {{$sevice->description}}
      </p>
    </div>
  </div>
</div>
</a>
@endforeach
<script>
    $(document).ready(function () {
        $('form#filter-form').on('submit', function (event) {
            event.preventDefault(); // prevent default form submission
            $.ajax({
                url: '/filter',
                type: 'post',
                dataType: 'json',
                data: $(this).serialize(), // serialize form data
                success: function (response) {
                    // update view with new services
                    var servicesContainer = $('#services-container');
                    servicesContainer.empty();
                    $.each(response.services, function (index, service) {
                        var html = '<div class="service">' +
                            '<h3>' + service.title + '</h3>' +
                            '<p>' + service.description + '</p>' +
                            '</div>';
                        servicesContainer.append(html);
                    });
                }
            });
        });
    });
</script>

