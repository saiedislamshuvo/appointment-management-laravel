<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-3">Change Password</h4>
        <form action="{{ route('user.change-password') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label>Old Password</label>
                        <input type="password" name="old_password" class="form-control"
                            placeholder="Type Old Password">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label>New Password</label>
                        <input type="password" name="new_password" id="newPassword" class="form-control"
                            placeholder="Type New Password">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirmPassword" class="form-control"
                            placeholder="Type Confirm Password">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-primary" value="Change Password">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
