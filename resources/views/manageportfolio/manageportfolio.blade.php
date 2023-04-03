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
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Link</th>
                  <th scope="col">Remove</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($portfolios as $portfolio)

                <tr>
                  <td class="image product-thumbnail">
                    <img
                      src="{{ url('imgs/'.$portfolio->image) }}"
                      class="img-fluid"
                      alt="#"
                    />
                  </td>
                  <td class="product-des product-name">
                    <h5 class="product-name">
                      <a class="text-success" href=""
                        >{{ $portfolio->title }}</a
                      >
                    </h5>

                  </td>

                  <td>{{ Illuminate\Support\Str::limit($portfolio->description, 100) }}</td>
                  <td>{{ $portfolio->link }}</td>
                  <td class="action" data-title="Remove">
                    <form action="{{ route('manageportfolio.destroy', $portfolio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-muted bg-transparent border-0" onclick="return confirm('Are you sure you want to delete this portfolio?')">
                            <i class="bx bx-trash-alt"></i>
                        </button>
                    </form>
                </td>
                <td class="action" data-title="Edit">
                    <a href="{{ route('editportfolio', ['id' => $portfolio->id]) }}" class="text-muted"><i class="bx bx-edit-alt"></i></a>

                </td>
                </tr>
                @endforeach
                {{ $portfolios->links() }}
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
