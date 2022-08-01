@extends('src.layouts.app')

@section('title', 'Roles')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'Roles',
        'items' => [['title' => 'Dashboard', 'route' => route('dashboard')]],
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"><i class="dripicons-add"></i> Create
                        Role</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped dt-responsive nowrap w-100" id="roles-table">
                            <thead>
                                <tr>
                                    <th width="5%" data-priority="1">Sl</th>
                                    <th width="10%" data-priority="2">Name</th>
                                    <th width="60%" data-priority="4">Permissions</th>
                                    <th width="15%" data-priority="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $perm)
                                                @include('src.partials.table.bagde', [
                                                    'value' => $perm->name,
                                                ])
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (auth()->user()->can('admin.edit'))
                                                <a class="btn btn-warning shadow btn-xs sharp me-1"
                                                    href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                        class="dripicons-document-edit"></i></a>
                                            @endif

                                            @if (auth()->user()->can('admin.edit'))
                                                <a class="btn btn-danger shadow btn-xs sharp me-1"
                                                    href="{{ route('admin.roles.destroy', $role->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    <i class="dripicons-trash"></i>
                                                </a>

                                                <form id="delete-form-{{ $role->id }}"
                                                    onsubmit="return confirm('are you sure? you want to delete this role!')"
                                                    action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            @endif
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
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#roles-table').DataTable({
                responsive: true,
            });
        });
    </script>
@endpush
