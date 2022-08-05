<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dt-responsive nowrap w-100" id="appointments-table">
                        <thead>
                            <tr>
                                <th data-priority="1">Id</th>
                                <th data-priority="2">SL</th>
                                <th data-priority="3">Name</th>
                                <th data-priority="4">Phone</th>
                                <th data-priority="8">Date Time</th>
                                <th data-priority="5">Visit</th>
                                <th data-priority="6">Status</th>
                                <th data-priority="10">Created At</th>
                                <th data-priority="9">Note</th>
                                <th data-priority="7">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function() {
            $('#appointments-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ $appointmentRoute }}',
                columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'serial',
                    name: 'serial',
                }, {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                }, {
                    data: 'phone',
                    name: 'phone',
                    orderable: false
                }, {
                    data: 'datetime',
                    name: 'datetime',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'visit',
                    name: 'visit',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'created_at',
                    name: 'created_at'
                }, {
                    data: 'note',
                    name: 'note',
                    orderable: false,
                    searchable: false
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
