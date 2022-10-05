@component('mail::message')
<h1>Teste de email automático com laravel</h1>

<p>Funcionou, {{$user->name}}</p>
@component('mail::button', array('url' => '#'))
    Exemplo
@endcomponent

@endcomponent
