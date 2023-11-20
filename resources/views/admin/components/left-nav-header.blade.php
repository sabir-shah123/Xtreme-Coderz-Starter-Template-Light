<div class="leftbar-profile p-3 w-100">
    <div class="media position-relative">
        <div class="leftbar ">
            <img src="{{ asset(user()->photo) }}" alt="" class="thumb-md rounded-circle" onerror="this.src='{{ asset('assets/images/users/dr-1.jpg') }}'">
        </div>
        <div class="media-body align-self-center text-truncate ml-3">
            <h5 class="mt-0 mb-1 font-weight-semibold">{{ settings('companysignature',authId())?? "Howdy!" }}</h5>
            @if(userRole() == 0)
            <p class="text-uppercase mb-0 font-12">Admin <span class="text-primary text-lowercase"> ( admin ) </span> </p>
            @else
            <p class="text-uppercase mb-0 font-12"> Company  <span class="text-primary text-lowercase"> ( admin ) </span></p>
            @endif
        </div><!--end media-body-->
    </div>
</div>
