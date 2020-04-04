@component('mail::message')
# <strong>Subject</strong> : {{ $data['subject'] }}
## <strong>Email</strong> {{ $data['email'] }}

{{$data['message']}}


@endcomponent