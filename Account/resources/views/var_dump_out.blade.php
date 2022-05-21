<!DOCTYPE html>
<html>
    <head>
        <title>ダンプ | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <form action="dump_out" method="post">
        @csrf
        <input type="text" name="account_id" value="{{ old('account_id') }}"  placeholder="ID"/>
        <input type="password" name="password" value="" placeholder="パスワード"/>
        <button type="submit">ダンプ</button>
        </form>
    </body>
</html>