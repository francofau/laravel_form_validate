<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Forms - HTML Puro</title>
</head>
<body>
    <!-- Si todos los campos están validados, mostramos un mensaje de EXITO -->
    @if(Session::has('success'))
        <strong>
            {{Session::get('success')}}
        </strong>
    @endif       
    <form method="post" action="guardar">
        @csrf                        
        <label for="nombre">Nombre</label>
        <input type="text" class="" name="nombre" id="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
        <br><br>
        <label for="email">Email</label>
        <input type="email" class="" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
        <br><br>
        <label for="pass">Password</label>
        <input type="password" class="" name="pass" id="pass" value="{{ old('pass') }}">      
        @error('pass')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
        <br><br>
        <label for="pass_confirmation">Confirmación de Password</label>
        <input type="password" class="" name="pass_confirmation" id="pass_confirmation" value="{{ old('pass_confirmation') }}">        
        @error('pass_confirmation')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
        <br><br>
        <input type="submit" name="send" value="Enviar">
    </form>
</body>
</html>