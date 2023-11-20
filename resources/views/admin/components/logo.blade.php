<!-- LOGO -->
@php
    $logo = App\Models\Setting::where(['key' => 'companylogo', 'user_id' => authId()])->first()->value ?? '';
@endphp
<a href="{{ route('dashboard') }}" class="logo">
    <span>
        <img src="{{ asset($logo) }}" alt="logo-small" class="logo-sm" style="display:none ">
    </span>
    <span>
        <img src="{{ asset($logo) }}" alt="logo-large" class="logo-lg logo-light">
        <img src="{{ asset($logo) }}" alt="logo-large" class="logo-lg logo-dark">
    </span>
</a>
<!--end logo-->
