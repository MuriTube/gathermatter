@component('mail::message')
# Email Verification

Thank you for registering. Please click on the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify your email
@endcomponent

If you did not register on our website, please ignore this email.

Best regards,<br>
{{ config('app.name') }}
@endcomponent
