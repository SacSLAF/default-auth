@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @session('success')
                    <div class="alert alert-success">
                        {{ $value }}
                    </div>
                    @endsession
                    <a href="{{ route('users.create') }}" class="btn btn-success mb-2">Create User</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-info btn-sm">View</a>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display:inline;"></form>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection