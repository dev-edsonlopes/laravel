@if ($message = Session::get('erro'))
        {{ $message }}
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br />
        
    @endforeach
@endif

<form action="{{route('login.auth')}}" method="POST">
    @csrf
    Email:
        <input type="email" name="email" id="email" /><br />
    Senha:
        <input type="password" name="password" id="password" /><br />
        <button type="submit">Entrar</button>
</form>