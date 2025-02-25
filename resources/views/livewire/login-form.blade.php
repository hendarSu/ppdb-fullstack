<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-12">
            <div class="p-0">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12 col-xl-12 col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mx-auto">
                                <div class="mb-0 border-0 mt-5">
                                    <div class="p-0">
                                        <div class="text-center">
                                            <div class="auth-title-section mb-3">
                                                <h3 class="text-dark fs-20 fw-medium mb-2">
                                                    <i data-feather="shopping-cart"></i>
                                                    Kaashir</h3>
                                                <p class="text-dark text-capitalize fs-14 mb-0">Selamat Datang!</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-0">
                                         @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif

                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form wire:submit.prevent="login">
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" wire:model="email" class="form-control" required>
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" wire:model="password" class="form-control" required>
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group d-flex mb-3">
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <a class='text-muted fs-14' href='auth-recoverpw.html'>Forgot password?</a>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Login</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-center text-muted">
                                            <p class="mb-0">Don't have an account ?<a class='text-primary ms-2 fw-medium' target="_blank" href='https://wa.me/6281394449218'>Contact Me</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
