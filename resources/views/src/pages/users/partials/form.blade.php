<div class="row">
    <div class="col-md-3">
        <div class="form-group mt-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name ?? '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email"
                value="{{ $user->email ?? '' }}">
        </div>
    </div>
    @if (!($user->name ?? false))
        <div class="col-md-3">
            <div class="form-group mt-2">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Type Password">
            </div>
        </div>
    @endif
    <div class="col-md-3">
        <div class="form-group mt-2">
            <label>Assign Role</label>
            <select name="roles" id="roles" class="form-control">
                <option value="" selected>Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        @if (($user ?? false) && $user->roles[0]->id == $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
