@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Edit Employee') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')
                
                <input type='hidden' name=role_id value={{$user->role_id}}>

                <div class="form-group row">
                    <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dob" class="required col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                    <div class="col-md-6">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob', $user->dob) }}" required autocomplete="dob" >

                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="required col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                    <div class="col-md-6">
                        <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus>
                            <option value=""  selected hidden>Please Select</option>
                            <option value="male" {{ (old('gender',$user->gender ?? "") == 'male' ) ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ (old('gender',$user->gender ?? "") == 'female') ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @if(Auth::user()->role_id == 2)
                <input type="hidden" name="salary" value="{{$user->salary ? $user->salary : null}}">
                <input type="hidden" name="designation" value="{{$user->designation ? $user->designation : null}}">
                @else
                <div class="form-group row">
                    <label for="salary" class="required col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                    <div class="col-md-6">
                        <input  id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $user->salary) }}" required autocomplete="salary" >

                        @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
              
                <div class="form-group row">
                    <label for="designation" class="required col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                    <div class="col-md-6">
                        <select id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="designation" autofocus>
                            <option value=""  selected hidden>Please Select</option>
                            <option value="software engineer" {{ (old('designation',$user->designation ?? "") == 'software engineer' ) ? 'selected' : '' }}>Software Engineer</option>
                            <option value="human resources" {{ (old('designation',$user->designation ?? "") == 'human resources') ? 'selected' : '' }}>Human Resource</option>
                            <option value="recruiter" {{ (old('designation',$user->designation ?? "") == 'recruiter') ? 'selected' : '' }}>Recruiter</option>
                        </select>
                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    <label for="address" class="required col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address" >

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
