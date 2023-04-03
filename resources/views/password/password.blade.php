@extends('layouts.app')

@section('content')
<section id="editpassword" class="">
    <div class="container">
        <div class="row">
            <h4 class="text-center">Change Your Password</h4>
            @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
            <form method="post" class="contact-form" action="{{ route('password.update.post') }}">
                @csrf

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                    @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection
