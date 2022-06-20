<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-secondary  d-flex justify-content-between align-items-center">
                    <h3 class="text-light">GroupEmployee</h3>
                    <div class="card-btn">
                        <a class="btn btn-light" href="{{ route('groupEmployee.create') }}">Add New
                            GroupEmployee</span></a>
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
                                    <th>MASO</th>
                                    <th>Name</th>
                                    <th>quantity employees</th>
                                    <th>active</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->group_employees }}</td>
                                        <td>{{ $group->employees->count() }}</td>
                                        <td class="">
                                            <a href=" "><i class="bi-pencil-square h4"></i></a>
                                            <form action="{{ route('groupEmployee.destroy', $group->id) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
