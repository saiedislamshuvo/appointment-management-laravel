@extends('src.layouts.app')

@section('title', 'Users')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'Users',
        'items' => [['title' => 'Dashboard', 'route' => route('dashboard')]],
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="dripicons-add"></i> Add
                        User</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped dt-responsive nowrap w-100" id="users-table">
                            <thead>
                                <tr>
                                    <th data-priority="1">Id</th>
                                    <th data-priority="3">Name</th>
                                    <th data-priority="3">Email</th>
                                    <th data-priority="5">Roles</th>
                                    <th>Created At</th>
                                    <th data-priority="4">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('users.index') }}',
                columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                }, {
                    data: 'email',
                    name: 'email',
                    orderable: false
                }, {
                    data: 'roles',
                    name: 'roles',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'created_at',
                    name: 'created_at'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }]
            });
        });
    </script>
@endpush
