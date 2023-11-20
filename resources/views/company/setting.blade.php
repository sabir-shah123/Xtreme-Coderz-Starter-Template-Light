@extends('layouts.app')
@section('title', 'Company Settings')
@section('content')

    {{-- Mustard Main Api Key

    71e05810-220d-11ec-96a1-a5d2c45bea14 --}}

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Save Your Company Settings</li>
                    </ol>
                </div>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">

        @php
            $cuid = authId();
            $settings = App\Models\Setting::where(['user_id' => $cuid])->pluck('value', 'key')->toArray();
        @endphp

        {{-- company settigns --}}
        <div class="col-md-12">
            <h3 class="page-title my-3">Save Your Company Details</h3>
            <div class="card">
                <form action="{{ route('company.setting.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companyname">Company Logo</label>
                                    <input type="file" class="form-control dropify" name="companylogo" id="companylogo"
                                        placeholder="Place Your Company Logo Link Here"
                                        value="" data-default-file="{{ asset($settings['companylogo'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companysignature">Company Signature</label>
                                    <input type="text" class="form-control " name="companysignature"
                                        id="companysignature" placeholder="Place Your Company Signature Link Here"
                                        value="{{ $settings['companysignature']  ?? '' }}"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companywebsite1"> Company Website 1 </label>
                                    <input type="text" class="form-control" name="companywebsite1" id="companywebsite1"
                                        placeholder="Company Name 1" value="{{ $settings['companywebsite1']  ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companywebsite2"> Company Website 2 </label>
                                    <input type="text" class="form-control" name="companywebsite2" id="companywebsite2"
                                        placeholder="Company Name 2" value="{{ $settings['companywebsite2']  ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companyemail2">Company Email 2</label>
                                    <input type="text" class="form-control" name="companyemail2" id="companyemail2"
                                        placeholder="Second Company Email" value="{{ $settings['companyemail2']  ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companyphone1">Company Phone 1</label>
                                    <input type="text" class="form-control" name="companyphone1" id="companyphone1"
                                        placeholder="Company Phone" value="{{ $settings['companyphone1']  ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companyphone2">Company Phone 2</label>
                                    <input type="text" class="form-control" name="companyphone2" id="companyphone2"
                                        placeholder="Company Phone 2" value="{{ $settings['companyphone2']  ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="companyaddress">Company Address</label>
                                    <textarea type="text" class="form-control" name="companyaddress" id="companyaddress"
                                        placeholder="Company Complete Address" rows="3">{{ $settings['companyaddress']   ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Save Company Settings</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
