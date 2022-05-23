<!DOCTYPE html>
<html>
    <head>
        <title>アカウント作成確認 | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <form action='accountcreatecomplete' method="post">
        @csrf
        <table>
            <tbody>
                <tr>
                <th>アカウントID</th>
                <td>
                    <input type="text" disabled="disabled" name="account_id" value="<?php echo $account_id; ?>" >
                    <input type="hidden" name="account_id" value="<?php echo $account_id; ?>" >
                </td>
                </tr>

                <tr>
                <th>パスワード</th>
                <td>
                <input type="text" disabled="disabled" name="password" value="<?php echo $password; ?>" >
                    <input type="hidden" name="password" value="<?php echo $password; ?>" >
                </td>
                </tr>

                <tr>
                <th>管理者</th>
                <td>
                    @if($admin == 1)
                    <input type="checkbox" disabled="disabled" name="admin" value="1" checked>
                    <input type="hidden" name="admin" value="1">
                    @else
                    <input type="checkbox" disabled="disabled" name="admin" value="0">
                    <input type="hidden" name="admin" value="0">
                    @endif
                </td>
                </tr>
            </body>
        </table>

        <ul>
            <li>
                <button type="submit" name=fix>戻る</a>
            </li>
            <li>
                <button type="submit">完了</a>
            </li>
        </ul>    
    </form>
</html>