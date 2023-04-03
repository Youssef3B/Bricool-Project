@extends('layouts.app')

@section('content')

<section class="mt-50 mb-50 favorite">
    <div class="container">
      <div class="row">
        <h2 class="text-center mb-3">Manage Your Services</h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="col-12">
          <div class="table-responsive">
            <table class="table shopping-summery text-center clean">
              <thead>
                <tr class="main-heading">
                  <th scope="col">Image</th>
                  <th scope="col">Description</th>

                  <th scope="col">Categories</th>
                  <th scope="col">City</th>
                  <th scope="col">Remove</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($services as $service)

                <tr>
                  <td class="image product-thumbnail">
                    <img
                      src="{{ url('imgs/'.$service->image_one) }}"
                      class="img-fluid"
                      alt="#"
                    />
                  </td>
                  <td class="product-des product-name">
                    <h5 class="product-name">
                      <a class="text-success" href="product-details.html"
                        >{{ $service->title }}</a
                      >
                    </h5>
                    <p class="font-xs">
                        {{ Illuminate\Support\Str::limit($service->description, 200) }}
                    </p>
                  </td>

                  <td>{{ Auth::user()->servece }}</td>
                  <td class="text-right" data-title="Cart">
                    <span>{{ Auth::user()->city }} </span>
                  </td>
                  <td class="action" data-title="Remove">
                    <a href="{{ route('deleteservices', ['id' => $service->id]) }}" class="text-muted"
                      ><i class="bx bx-trash-alt"></i
                    ></a>
                  </td>
                  <td class="action" data-title="Remove">
                    <a href="{{ route('services.edit', ['service' => $service->id]) }}" class="text-muted"
                      ><i class="bx bx-edit-alt"></i
                    ></a>
                  </td>
                </tr>
                @endforeach
                {{ $services->links() }}
                <tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@section('content')



@endsection
