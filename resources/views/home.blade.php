@extends('layouts.app')


@section('content')
    <div class="">
        @if(checkPermission(['admin']))
            <a class="welcomebutton" href={{url('edit-records')}} aria-expanded="false" v-pre>
                Users
            </a>
            <a class="welcomebutton" href={{ route('category.index') }} aria-expanded="false" v-pre>
                Categories
            </a>
        @endif
            <div class="dropdown-container">
                <select name="category_id" required>
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>


    </div>

@endsection
