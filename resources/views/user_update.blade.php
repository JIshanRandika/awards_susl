
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
{{--                <option value=<?php echo$users[0]->is_permission; ?> selected>Choose...</option>--}}

                                <option value=<?php echo$users[0]->is_permission; ?> selected><?php echo
                    ($users[0]->is_permission == '-1' ? "Admin" :
                    ($users[0]->is_permission == '1' ? "Vice Chancellor" :
                        ($users[0]->is_permission == '2' ? "Registrar" :
                            ($users[0]->is_permission == '31' ? "Assistant Registrar of The Faculty of Graduate Studies" :
                                ($users[0]->is_permission == '32' ? "Assistant Registrar of The Faculty of Agriculture Science" :
                                    ($users[0]->is_permission == '33' ? "Assistant Registrar of The Faculty of Applied Sciences" :
                                        ($users[0]->is_permission == '34' ? "Assistant Registrar of The Faculty of Geomatics" :
                                            ($users[0]->is_permission == '35' ? "Assistant Registrar of The Faculty of Management Studies" :
                                                ($users[0]->is_permission == '36' ? "Assistant Registrar of The Faculty of Medicine" :
                                                    ($users[0]->is_permission == '37' ? "Assistant Registrar of The Faculty of Social Sciences & Languages" :
                                                        ($users[0]->is_permission == '38' ? "Assistant Registrar of The Faculty of Technology" :
                                                            ($users[0]->is_permission == '39' ? "Assistant Registrar of The Faculty of Computing" :
                                                                ($users[0]->is_permission == '4' ? "Student Affairs Division Clerk" : "Finance Division Clerk")))))))))))))

                ?></option>
                <option value=-1>Admin</option>
                <option value=1>Vice Chancellor</option>
                <option value=2>Registrar</option>
                <option value="31">Assistant Registrar of The Faculty of Graduate Studies</option>
                <option value="32">Assistant Registrar of The Faculty of Agriculture Science</option>
                <option value="33">Assistant Registrar of The Faculty of Applied Sciences</option>
                <option value="34">Assistant Registrar of The Faculty of Geomatics</option>
                <option value="35">Assistant Registrar of The Faculty of Management Studies</option>
                <option value="36">Assistant Registrar of The Faculty of Medicine</option>
                <option value="37">Assistant Registrar of The Faculty of Social Sciences & Languages</option>
                <option value="38">Assistant Registrar of The Faculty of Technology</option>
                <option value="39">Assistant Registrar of The Faculty of Computing</option>
                <option value="4">Student Affairs Division Clerk</option>
                <option value="5">Finance Division Clerk</option>

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
