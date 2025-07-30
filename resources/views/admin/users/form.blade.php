<div class="m-portlet m-portlet--tab">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    @isset($user)
                        <i class="flaticon-avatar"></i>&nbsp; {{ $user->name }} Profile
                    @else
                        <i class="flaticon-user-add"></i>&nbsp; Add a New User
                    @endisset
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form method="POST" class="m-form m-form--fit m-form--label-align-right"
        action=" {{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label" for="name">Name</label>
                <div class="col-10">
                    <input type="text" class="form-control m-input @error('name') is-invalid @enderror"
                        id="name" name="name" placeholder="User Name"
                        value="{{ old('name', $user->name ?? '') }}" required minlength="2" maxlength="255">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label" for="email">Email</label>
                <div class="col-10">
                    <input type="email" class="form-control m-input @error('email') is-invalid @enderror"
                        name="email" id="email" placeholder="Enter your email" required
                        value="{{ old('email', $user->email ?? '') }}" autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label" for="mobile">Mobile</label>
                <div class="col-10">
                    <input type="tel" class="form-control m-input @error('mobile') is-invalid @enderror"
                        id="mobile" name="mobile" placeholder="Phone Number" required pattern="[0-9]{10,15}"
                        value="{{ old('mobile', $user->mobile ?? '') }}">
                    @error('mobile')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label" for="password">Password</label>
                <div class="col-10">
                    <input type="password" class="form-control m-input @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="Password"
                        value="{{ old('password', $user->password ?? '') }}" {{ !isset($user) ? 'required' : '' }}
                        minlength="8">
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-2 col-form-label">Groups</label>
                <div class="col-9">
                    <div class="m-radio-inline">
                        <label class="m-radio">
                            <input type="radio" name="example_8" value="0">Admin
                            <span></span>
                        </label>
                        <label class="m-radio">
                            <input type="radio" name="example_8" value="1"checked>Super Admin
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class ="form-group m-form__group row "
                    style="display: flex;justify-content: end;padding-top: 15px;">
                    <button type="submit" class="btn btn-brand">
                        @isset($user)
                            Update
                        @else
                            Create
                        @endisset
                    </button>&nbsp;&nbsp;
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

<script src="{{ asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js') }}"></script>
<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/demo12/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/demo12/custom/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
