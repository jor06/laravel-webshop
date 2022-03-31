<h1>EDIT PRODUCT PAGE</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.product', $product->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="<?= $product->name ?>"
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" autocomplete="stock" autofocus>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="info" class="col-md-4 col-form-label text-md-end">{{ __('Info') }}</label>

                            <div class="col-md-6">
                                <input id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info" value="{{ old('info') }}"  autocomplete="info">

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>