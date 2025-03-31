@extends('layouts.app2') <!-- Jei turite bendrą maketą -->

@section('content')
    <div class="container">
        <h1>Users roles page</h1>

        @if($users->isEmpty())
            <p>No products found for the users.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Surname</th>
                        <th>User Email</th>
                        <th>User Roles</th>
                        {{-- <th>Product Title</th>
                        <th>Product Description</th>
                        <th>Product Price</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ optional($user)->id ?? 'No user' }}</td>
                            <td>{{ optional($user)->name ?? '' }}</td>
                            <td>{{ optional($user)->surname ?? '' }}</td>
                            <td>{{ optional($user)->email ?? '' }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Role ID</th>
                        <th>Role Name</th>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if($role->users->isNotEmpty())
                                    <ul>
                                        @foreach($role->users as $user)
                                            <li>{{ $user->name }} ({{ $user->email }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    No users assigned
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No roles found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>
@endsection