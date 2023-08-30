
@extends('layouts.app')


@section('content')
    @if(checkPermission(['admin']))
    <div class="card p-3 mb-2  text-white">

        <a style="
        background-color: #0a53be;width: 120px;
        border-radius: 10px;
        color: white;
        padding: 10px;
        text-decoration: none;
        margin-bottom: 10px;
        " href="{{ route('user.create') }}" aria-expanded="false" v-pre>
            Add New User
        </a>

        <h5 class="card-header bg-secondary">User Details</h5>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body  ">

            <table class="table table-striped">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Permission</td>


                    <td>Option</td>

                </tr>
                @foreach ($users as $user)
                    @if( $user->name != 'None')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->is_permission == '-1')
                                <td>{{'Admin' }}</td>
                            @elseif($user->is_permission == '1')
                                <td>{{'Reviewer' }}</td>
                            @else
                                <td>{{'User' }}</td>
                            @endif
{{--                            <td>{{ $user->is_permission }}</td>--}}

                            <td>
                                <a href = 'edit/{{ $user->id }}'>View</a>
                                </br>
                                <a href = 'delete/{{ $user->id }}'>Delete</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

        </div>

    </div>
    @endif


@endsection
