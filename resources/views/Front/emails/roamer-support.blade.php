<x-mail::message>
# Roamer Support Email Request

{{ $data['msg'] }}


# Contact Details:

- email #{{ $data['email'] }}
- phone #{{ $data['phone'] }}
- whatsapp #{{ $data['whatsapp'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
