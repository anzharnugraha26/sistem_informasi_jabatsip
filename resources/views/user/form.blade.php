@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            @if ($flag == 0)
                <h1>Tambah Data User</h1>
            @else
                <h1>Edit Data User</h1>
            @endif

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            @if ($flag == 0)
                                <form method="POST" action="{{ url('user/store') }}">
                                    @csrf

                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="username"
                                                value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Kode User') }}</label>

                                        <div class="col-md-6">
                                            <input id="kode_user" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="kode_user"
                                                value="{{ old('kode_user') }}" required autocomplete="kode_user" autofocus>

                                            @error('kode_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 mt-3">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form method="POST" action="{{ url('user/update') }}">
                                    @csrf

                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                        <div class="col-md-6">
                                            <input type="hidden" name="id" id=""
                                                value="{{ $user->id }}">
                                            <input id="username" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="username"
                                                value="  {{ $user->username }}" required
                                                autocomplete="username">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Kode User') }}</label>

                                        <div class="col-md-6">
                                            <input id="kode_user" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="kode_user"
                                                value="  {{ $user->kode_user }}" required
                                                autocomplete="kode_user">

                                            @error('kode_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="  {{ $user->name }}" required
                                                autocomplete="name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }} {{ $user->email }}" required
                                                autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-right"> </label>

                                        <div class="col-md-6">
                                            <select name="c_password" class="form-select"
                                                onchange="hideDiv('displaypassword' , this)">
                                                <option value="0">Gunakan Password Lama</option>
                                                <option value="1">Ganti Password Baru</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div style="display: none" id="displaypassword">

                                        <div class="form-group row mt-3">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation"  autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-3">
                                        <div class="col-md-6 offset-md-4">
                                            <button  class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        function hideDiv(id, elementValue) {
            document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
        }
    </script>
@endsection
