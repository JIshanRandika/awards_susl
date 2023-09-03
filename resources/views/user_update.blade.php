
@extends('layouts.app')


@section('content')
    @if(checkPermission(['admin']))
<div class="card p-3 mb-2 bg-secondary text-white">
    <h5 class="card-header">Details</h5>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
     <div class="mb-4">
        <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table width="90%">
        <tr>
        <td width="30%">
        Name

        </td>
        <td width="70%">
        <input  class="form-control" type = 'text' name = 'name'
        value = '<?php echo$users[0]->name; ?>'/> </td>
        </tr>
        <tr>
        <td>Email</td>
        <td>
        <input class="form-control" type = 'text' name = 'email'
        value = '<?php echo$users[0]->email; ?>'/>
        </td>
        </tr>
        <tr>

        <td>Permission</td>
        <td>
{{--        <input class="form-control" type = 'text' name = 'roleNo'--}}
{{--        value = '<?php echo$users[0]->is_permission; ?>'/>--}}
            <select required name="is_permission" class="custom-select" id="inputGroupSelect01" >
                <option value=-1>Admin</option>
                <option value=1>Reviewer</option>
                <option value=2>User</option>

            </select>
        </td>
        </tr>

        <tr>
        <td colspan = '2'>
        </br>
        <input  type = 'submit' value = "Update User Details" />
        </td>
        </tr>
        </table>
        </form>

    </div>
    </div>
</div>
    @endif
@endsection
