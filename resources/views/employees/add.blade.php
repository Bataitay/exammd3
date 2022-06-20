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
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="p-4 bg-light">
            <div class="my-2">
                <label for="pwd">fullname</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="fullname">
                {{ $errors->first('fullname') }}
            </div>
            <div class="my-2">
                <label for="pwd">group_employee</label>
                <select class="form-control" name="groupE_id" id="groupE_id">
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->group_employees }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-2">
                <label for="pwd">general</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="general">
                {{ $errors->first('general') }}

            </div>
            <div class="my-2">
                <label for="pwd">phone</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="phone">
                {{ $errors->first('phone') }}

            </div>
            <div class="my-2">
                <label for="pwd">cmnd</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="cmnd">
                {{ $errors->first('cmnd') }}

            </div>
            <div class="my-2">
                <label for="pwd">address</label>
                <input value="" type="text" class="form-control" placeholder="Enter Category" name="address">
                {{ $errors->first('address') }}

            </div>
            <div class="my-2">
                <label for="pwd">email</label>
                <input value="" type="email" class="form-control" placeholder="Enter Category" name="email">
                {{ $errors->first('email') }}

            </div>
            <div class="my-2">
                <label for="pwd">birthday</label>
                <input value="" type="date" class="form-control" placeholder="Enter Category" name="birthday">
                {{ $errors->first('birthday') }}

            </div>

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
        </div>
    </form>
</div>
