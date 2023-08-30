
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
        " href="{{ route('category.create') }}" aria-expanded="false" v-pre>
                Add Category
            </a>

            <h5 class="card-header bg-secondary">Categories</h5>

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

                        <td>Action</td>

                    </tr>
                    @foreach ($categories as $category)
                        @if( $category->category != 'None')
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category }}</td>

                                <td>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
{{--                                    <a href = 'delete/{{ $category->id }}'>Delete</a>--}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

            </div>

        </div>
    @endif


@endsection
