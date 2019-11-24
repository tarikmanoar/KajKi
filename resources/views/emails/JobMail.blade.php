@component('mail::message')
Hi, {{$mailArray['friend_name']}} <strong>{{$mailArray['username']}}</strong> ({{$mailArray['email']}}) , has referred
you this job.
@component('mail::button', ['url' => $mailArray['jobUrl']])
See Job
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
