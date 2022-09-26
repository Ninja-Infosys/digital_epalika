@component('mail::message')
    # Welcome

    Congratulations, your request to be registered in our system has been successfully accepted. Please click on button below to set up password

    @component('mail::button', ['url' => $url])
        Click to setup password
    @endcomponent


    <a href="{{$url}}">click me</a> to setup password if button is not working.
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
