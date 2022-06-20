<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
<div class="modal-content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('groupEmployee.store') }}" method="POST">
        @csrf
        <div class="p-4 bg-light">
            <div class="my-2">
                <label for="pwd">group_employees</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="group_employees">
                {{ $errors->first('group_employees') }}
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
        </div>
    </form>
</div>
