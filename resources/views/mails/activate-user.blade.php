<h1>Подверждения аккаунта</h1>
<p>Для подтверждения аккаунта перейдите по ссылке:</p>
<a href="{{ route('user.activate', $user->activation_hash) }}">{{ route('user.activate', $user->activation_hash) }}</a>