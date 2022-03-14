<x-layouts.app>
    <section>
        <div class="page-header section-height-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">{{ __('Bienvenido de Nuevo!') }}
                                </h3>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success mb-3 rounded-0" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST" role="form text-left">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email">{{ __('Email') }}</label>
                                        <div class="@error('email') border border-danger rounded-3 @enderror">
                                            <input id="email" type="email"
                                                class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control"
                                                placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                                name="email" :value="old('email')" required>
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">{{ __('Password') }}</label>
                                        <div class="@error('password') border border-danger rounded-3 @enderror">
                                            <input id="password" type="password"
                                                class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control"
                                                placeholder="Password" aria-label="Password" name="password"
                                                aria-describedby="password-addon" required
                                                autocomplete="current-password">
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remember_me">
                                        <label class="form-check-label"
                                            for="remember_me">{{ __('Recuerdame') }}</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Iniciar Sesión') }}</button>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <small
                                            class="text-muted">{{ __('Olvidates tu contraseña? Vuelve a crearla') }}
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                    class="text-info text-gradient font-weight-bold">{{ __('Aqui') }}</a>
                                        </small>
                                        @endif
                                        <p class="mb-4 text-sm mx-auto">
                                            {{ __('No posees Cuenta?') }}
                                            <a href="{{ route('register') }}"
                                                class="text-info text-gradient font-weight-bold">{{ __('Registrarse') }}</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
