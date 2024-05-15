<div class="">
    <div class="row">
        
        <div class="form-group mb-2 mb20">
            <strong> <label for="name" class="form-label">{{ __('Name') }}</label> {{-- <strong class="text-danger"> * </strong> --}}  </strong>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror rounded-05" value="{{ old('name', $user?->name) }}" id="name" >
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="email" class="form-label">{{ __('Email') }}</label> {{-- <strong class="text-danger"> * </strong> --}}  </strong>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror rounded-05" value="{{ old('email', $user?->email) }}" id="email" >
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="password" class="form-label">{{ __('Password') }}</label> {{-- <strong class="text-danger"> * </strong> --}}  </strong>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror rounded-05" value="{{ old('password', $user?->password) }}" id="password" >
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <strong> <label for="n_p_i" class="form-label">{{ __('Npi') }}</label> {{-- <strong class="text-danger"> * </strong> --}}  </strong>
            <input type="text" name="NPI" class="form-control @error('NPI') is-invalid @enderror rounded-05" value="{{ old('NPI', $user?->NPI) }}" id="n_p_i" >
            {!! $errors->first('NPI', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
