@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin: 50px"  class="">
            <div class="row" style="margin: 50px">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href={{url('edit-records')}}> Back</a>
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
                        <div class="card-header">{{ __('New users') }}</div>

                        <div class="card-body">


                            <form action="{{ route('user.store') }}" id="selectform" method="POST">
                                @csrf
                                <div style="margin: 20px" class="row">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input required type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input required type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                        <div class="col-md-6">
                                            <select required name="is_permission" class="form-control" id="frm_duration">

                                                <option value=-1>Admin</option>
                                                <option value=1>Reviewer</option>
                                                <option value=2>User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input required type="password" name="password" class="form-control" placeholder="Password">
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
