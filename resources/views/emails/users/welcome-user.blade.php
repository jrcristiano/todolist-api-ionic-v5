@component('mail::message')
# Olá, {{ $user->name }}! Seja bem-vindo ao Nucleus.

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Agradecimentos,<br>
Nucleus
@endcomponent
