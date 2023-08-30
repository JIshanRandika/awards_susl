@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin: 50px"  class="">
            <div class="row" style="margin: 50px">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href={{ route('category.index') }}> Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 m-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if(checkPermission(['admin']))
                    <div class="card">
                        <div class="card-header">{{ __('New Category') }}</div>

                        <div class="card-body">


                            <form action="{{ route('category.store') }}" id="selectform" method="POST">
                                @csrf
                                <div style="margin: 20px" class="row">
                                    <div class="row mb-3">
                                        <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                                        <div class="col-md-6">
                                            <input required type="text" name="category" class="form-control" placeholder="Category">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>




                                </div>

                            </form>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
