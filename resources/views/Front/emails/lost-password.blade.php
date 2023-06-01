<x-mail::message>
# Hello {{ $data['name'] }}

Your otp for {{ $data['email'] }} to change password is {{ $data['otp'] }}

<x-mail::button :url="''">
    Reset Your Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
