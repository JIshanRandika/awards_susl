@extends('layouts.app')

@section('content')
    <div class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if(checkPermission(['admin']))
            <a class="welcomebutton" href={{url('edit-records')}} aria-expanded="false" v-pre>
                Users
            </a>
            <a class="welcomebutton" href={{ route('category.index') }} aria-expanded="false" v-pre>
                Categories
            </a>
        @endif
            @if(checkPermission(['user']))
                <div class="dropdown-container">
                    <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <select name="category" required>
                                    <option value="" selected disabled>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="file" name="file" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input style="display: none" type="text" value="{{ Auth::user()->name }}"  name="authorName" class="form-control" placeholder="NIC">
                            </div>
                        </div>
                        <div  class="col-xs-12 col-sm-12 col-md-12">
                            <button class="welcomebutton" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            @endif

            @if(checkPermission(['admin','reviewer']))
                @if (count($submissions) > 0)
                    <div style="padding: 50px">
                        <h2>Submissions</h2>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>File</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->authorName }}</td>
                                    <td>{{ $submission->category }}</td>
                                    <td><a href="{{ asset('submissions/' . $submission->file) }}" target="_blank">{{ $submission->file }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            @endif

    </div>
@endsection
