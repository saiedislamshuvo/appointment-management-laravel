<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-3">General Information</h4>
        <form action="{{ route('appearance.settings.app-info.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>App Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ $info['app_name'] }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>App Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ $info['app_email'] }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>App Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                            value="{{ $info['app_phone'] }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>App Location</label>
                        <textarea name="location" class="form-control" placeholder="Location" rows="6"
                            required>{!! $info['app_location'] !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h4 class="header-title mb-3">Social Information</h4>
        <form action="{{ route('appearance.settings.app-social.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" placeholder="Facebook"
                            value="{{ $social['app_facebook'] }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Google</label>
                        <input type="text" name="google" class="form-control" placeholder="Google"
                            value="{{ $social['app_google'] }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control" placeholder="Twitter"
                            value="{{ $social['app_twitter'] }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin"
                            value="{{ $social['app_linkedin'] }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>


<div class="card mt-4">
    <div class="card-body">
        <h4 class="header-title mb-3">Footer Information</h4>
        <form action="{{ route('appearance.settings.app-footer.update') }}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label>Copy Right Text</label>
                <input type="text" name="footer_text" class="form-control" placeholder="Write Footer Text"
                    value="{{ $info['app_footer_text'] }}" required>
            </div>
            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
