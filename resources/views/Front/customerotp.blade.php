<x-mail::message>
# Your Account Has Been Created Successfully


{{ $data['title'] }} is {{ $data['msg'] }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
