<!DOCTYPE html>
<html>
    <head>
        <title>ログイン | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <form action="menu" method="post">
        @csrf
        <input type="text" name="account_id" value="{{ old('account_id') }}"  placeholder="ID"/>
        <input type="password" name="password" value="" placeholder="パスワード"/>
        <button type="submit">ログイン</button>
        </form>

        @if (session('message'))
        <p style='color:#cc6262';>
        {{ session('message') }}
        </p>
        @endif
        
    </body>
</html>