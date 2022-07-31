<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-3">Profile</h4>
        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ auth()->user()->name ?? '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ auth()->user()->email ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-primary" value="Update Profile">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
