<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="card shadow p-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    <div class="card shadow p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('setting.update', $setting) }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row g-3 mb-3">

                <div class="col-md-6">
                    <label for="app_name" class="form-label required">App Name</label>
                    <input type="teks" class="form-control @error('app_name') is-invalid @enderror" id="app_name"
                        name="app_name" value="{{ old('app_name', $setting->app_name) }}" required>
                    @error('app_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="copyright" class="form-label required">Copyright</label>
                    <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyright"
                        name="copyright"value="{{ old('copyright', $setting->copyright) }}" required>
                    @error('copyright')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="keywoards" class="form-label">Keywoard</label>
                    <input type="text" class="form-control @error('keywoards') is-invalid @enderror" id="keywoards"
                        name="keywoards"value="{{ old('keywoards', $setting->keywoards) }}" required>
                    @error('keywoards')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        id="description" name="description"value="{{ old('description', $setting->description) }}"
                        required>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="logo" class="form-label">Logo (Max Size 2 MB)</label>

                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                        name="logo">

                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <img src="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/logo.png') }}"
                        alt="Logo" class="img-fluid rounded mt-3" width="150" id="preview">
                </div>

                <div class="col-md-6">
                    <label for="login_title" class="form-label required">Login Title</label>
                    <input type="text" class="form-control @error('login_title') is-invalid @enderror"
                        id="login_title" name="login_title" value="{{ old('login_title', $setting->login_title) }}"
                        required>
                    @error('login_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <a class="btn btn-warning" href="{{ route('setting.index') }}" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>


    @push('modals')
    @endpush

    @push('scripts')
    @endpush





</x-app>
