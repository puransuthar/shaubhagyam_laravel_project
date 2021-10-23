@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                    <form method="POST" id="updateProfileForm" action="{{ url('/user-profile/update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="alert alert-danger error-box" style="display:none" role="alert">
                        </div>
                        <div class="alert alert-success success-box" style="display:none" role="alert">
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $user->mobile_number }}" required autocomplete="mobile_number" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="male" name="gender" {{ ($user->gender == 'male') ? 'checked' : '' }} value="male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" {{ ($user->gender == 'female') ? 'checked' : '' }} value="female">
                                <label for="female">Female</label><br>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                
                                <select name="country" id="country">
                                    <option value=""></option>
                                    <option value="india" {{ ($user->country == 'india') ? 'selected' : '' }}>India</option>
                                    <option value="australia" {{ ($user->country == 'australia') ? 'selected' : '' }}>Australia</option>
                                    <option value="england" {{ ($user->country == 'england') ? 'selected' : '' }}>England</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                
                                <select name="city" id="city">
                                    <option value=""></option>
                                    <option value="ahmedabad" {{ ($user->city == 'ahmedabad') ? 'selected' : '' }}>Ahmedabad</option>
                                    <option value="surat" {{ ($user->city == 'surat') ? 'selected' : '' }}>Surat</option>
                                    <option value="pune" {{ ($user->city == 'pune') ? 'selected' : '' }}>Pune</option>
                                </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('Profile Pic') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="profile_pic" id="profile_pic">
                                
                                <img src="{{ asset('/user_images').'/'.$user->profile_pic }}">
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
