<x-mail::message>
# {{ $data['subject'] }}

{{ $data['message'] }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
