<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-secondary  d-flex justify-content-between align-items-center ">
                    <h3 class="text-light">Employee</h3>
                    <form action="">
                        <div class="input-group ">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" name="search"
                                    placeholder="Search" />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="card-btn">
                        <a class="btn btn-light" href="{{ route('employees.create') }}">Add New Employee</span></a>
                    </div>
                </div>
                <div class="card-body" id="show_all_categories">
                    <h5 class="text-center text-secondary ">Loading...</h5>
                    <div class="card-body" id="show_all_categories">
                        @if (Session::has('message'))
                            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                class="col-sm-6 alert alert-success">
                                <strong>Success!</strong>{{ session::get('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-sm text-center align-middle">
                            <thead>
                                <tr>
                                    <th>Ma_employee</th>
                                    <th>groupemployee</th>
                                    <th>fullname</th>
                                    <th>general</th>
                                    <th>phone</th>
                                    <th>active</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->group->group_employees }}</td>
                                        <td>{{ $employee->fullname }}</td>
                                        <td>{{ $employee->general }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td class="">
                                            <a href="{{ route('employees.edit', $employee->id) }}"><i
                                                    class="bi-pencil-square h4"></i></a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger mx-1 deleteIcon"
                                                    style="border:none "><i class="bi-trash h4 h4"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $employees->appends(request()->query()) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<style type="text/css">
    .input-group {
        float: right;
    }
</style>
