<div class="form-group">
    <label for="name">Role Name</label>
    <input type="text" class="form-control" id="name" value="{{ $role->name ?? '' }}" name="name"
        placeholder="Enter a Role Name">
</div>

<div class="form-group">
    <label for="name">Permissions</label>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1"
            @if ($role ?? false) {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }} @endif>
        <label class="form-check-label" for="checkPermissionAll">All</label>
    </div>
    <hr>
    @php $i = 1; @endphp
    @foreach ($permission_groups as $group)
        <div class="row">
            @php
                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                $j = 1;
            @endphp

            <div class="col-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management"
                        value="{{ $group->name }}"
                        onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                        @if ($role ?? false) {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }} @endif>
                    <label class="form-check-label" for="checkPermission">{{ $group->name ?? '' }}</label>
                </div>
            </div>

            <div class="col-9 role-{{ $i }}-management-checkbox">

                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                            name="permissions[]"
                            @if ($role ?? false) {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} @endif
                            id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                        <label class="form-check-label"
                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @php  $j++; @endphp
                @endforeach
                <br>
            </div>
        </div>
        @php  $i++; @endphp
    @endforeach
</div>

@push('scripts')
    <script>
        $("#checkPermissionAll").click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        function checkPermissionByGroup(className, checkThis) {
            const groupIdName = $("#" + checkThis.id);
            const classCheckBox = $('.' + className + ' input');
            if (groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
            implementAllChecked();
        }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.' + groupClassName + ' input');
            const groupIDCheckBox = $("#" + groupID);
            // if there is any occurance where something is not selected then make selected = false
            if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
                groupIDCheckBox.prop('checked', true);
            } else {
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
        }

        function implementAllChecked() {
            const countPermissions = {{ count($all_permissions) }};
            const countPermissionGroups = {{ count($permission_groups) }};
            if ($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)) {
                $("#checkPermissionAll").prop('checked', true);
            } else {
                $("#checkPermissionAll").prop('checked', false);
            }
        }
    </script>
@endpush
