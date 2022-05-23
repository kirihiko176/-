<!DOCTYPE html>
<html>
    <head>
        <title>アカウント作成完了 | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        @csrf
        <table>
            <tbody>
                <tr>
                <th>アカウントID</th>
                <td>
                    <input type="text" disabled="disabled" name="account_id" value="<?php echo $account_id; ?>" >                </td>
                </tr>

                <tr>
                <th>パスワード</th>
                <td>
                <input type="text" disabled="disabled" name="password" value="<?php echo $password; ?>" >
                </td>
                </tr>

                <tr>
                <th>管理者</th>
                <td>
                    @if($admin == 1)
                        <td>管理者</td>
                    @else
                        <td>一般</td>
                    @endif
                </td>
                </tr>
            </body>
        </table>

        <ul>
            <li>
                <a href="../menu">メニュー</a>
            </li>
        </ul>    
</html>