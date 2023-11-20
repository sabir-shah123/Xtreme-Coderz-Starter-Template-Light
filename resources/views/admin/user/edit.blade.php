@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.list') }}">Company</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Company</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.save', $data->id) }}" method="POST" class="card-box">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="first_name">First Name *</label>
                                <input type="text" placeholder="Enter First Name"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name', $data->first_name) }}" id="first_name" autocomplete="off">
                                @error('first_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="last_name">Last Name *</label>
                                <input type="text" placeholder="Enter Last Name"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name', $data->last_name) }}" id="last_name" autocomplete="off">
                                @error('last_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">Email *</label>
                                <input type="text" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $data->email) }}" id="email" autocomplete="off">
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">Phone *</label>
                                <input type="text" placeholder="Phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone', $data->phone) }}" id="phone" autocomplete="off">
                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">Make it Active? <small class="text-primary">Currently({{ $data->is_active==1 ? 'active' : 'disabled' }})</small></label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }} >Yes,Make it active</option>
                                    <option value="0" {{ $data->is_active == 0 ? 'selected' : '' }}>No, I'll do this later</option>
                                </select>
                                @error('is_active')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="api_key">Password *</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('user.list') }}"
                                class="btn btn-danger btn-sm text-light px-4 mt-3 float-right mb-0 ml-2">Cancel</a>
                            <button type="submit"
                                class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
