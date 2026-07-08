<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow p-4">

        <table class="table">

            <tr>

                <th width="200">Nama</th>

                <td>{{ $user->name }}</td>

            </tr>

            <tr>

                <th>Email</th>

                <td>{{ $user->email }}</td>

            </tr>

            <tr>

                <th>Role</th>

                <td>{{ $user->role }}</td>

            </tr>

            <tr>

                <th>Avatar</th>

                <td>

                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" width="120">
                    @endif

                </td>

            </tr>

        </table>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">

            Back

        </a>

    </div>

</x-app>
