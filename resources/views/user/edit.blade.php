<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow p-4">

        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama</label>

                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">

            </div>

            <div class="mb-3">

                <label>Role</label>

                <select name="role" class="form-select">

                    <option value="Superadmin" @selected(old('role', $user->role) == 'Superadmin')>

                        Superadmin

                    </option>

                    <option value="Admin" @selected(old('role', $user->role) == 'Admin')>

                        Admin

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Avatar</label>

                <input type="file" name="avatar" class="form-control">

            </div>

            <div class="text-end">

                <a href="{{ route('user.index') }}" class="btn btn-warning">

                    Cancel

                </a>

                <button class="btn btn-primary">

                    Update

                </button>

            </div>

        </form>

    </div>

</x-app>
