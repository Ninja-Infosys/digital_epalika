@if(auth()->check())
<div class="user text-center">
    <img src="{{auth()->user()?->profile_photo_url ?? ''}}" alt="user-img" title="Mat Helme"
         class="rounded-circle avatar-md">
    <div class="mt-2">

        <h4 class="mb-0 fw-bold text-white">{{auth()->user()?->name}}</h4>
        <p class="text-white mb-0">{{auth()->user()?->load('branch')?->branch?->branch_name}}</p>
    </div>
</div>
@endif

