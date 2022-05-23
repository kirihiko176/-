<!DOCTYPE html>
<html>
    <head>
        <title>アカウント作成 | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        @if (session('message'))
        <p style='color:#cc6262';>
        {{ session('message') }}
        </p>
        @endif
        <form action='accountcreatecheck' method="post">
        @csrf
        <table>
            <tbody>
                <tr>
                <th>アカウントID</th>
                <td>
                    <input type="text" value="{{old('account_id')}}" name="account_id">
                </td>
                </tr>

                <tr>
                <th>パスワード</th>
                <td>
                    <input type="text" value="{{old('password')}}" name="password">
                </td>
                </tr>

                <tr>
                <th>管理者</th>
                <td>
                    <input type="checkbox" value="1" name="admin"
                    @if(old('admin'==1))
                    checked
                    @endif
                    >
                </td>
                </tr>
            </body>
        </table>

        <ul>
            <li>
                <a href="../accountlist" action="accountlist">戻る</a>
            </li>
            <li>
                <button type="submit">確認</a>
            </li>
        </ul>    
    </form>
</html>