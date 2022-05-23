<!DOCTYPE html>
<html>
    <head>
        <title>アカウント更新 | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        @if (session('message'))
        <p style='color:#cc6262';>
        {{ session('message') }}
        </p>
        @endif
        <form action='accountrenewalcheck' method="post">   
        @csrf
        <br>
        
        <table>
            <tbody>
                <tr>
                <th>アカウントID</th>
                <td>
                    {{$results->account_id}}
                    <input type="hidden" value="{{$results->account_id}}" name="account_id">
                </td>
                </tr>

                <tr>
                <th>管理者</th>
                <td>
                    @if(old("admin",$results->admin)==1)
                    <input type="checkbox" value="1" name="admin" checked="checked">
                    @else
                    <input type="checkbox" value="1" name="admin">
                    @endif
                </td>
                </tr>

                <tr>
                <th>ロック</th>
                <td>
                    @if(old("lock",$results->lock)==1)
                    <input type="checkbox" value="1" name="lock" checked="checked">
                    @else
                    <input type="checkbox" value="1" name="lock">
                    @endif
                </td>
                </tr>

                <tr>
                <th>削除</th>
                <td>
                    @if(old("admin",$results->admin)==1)
                    <input type="checkbox" value="1" name="delete" checked="checked">
                    @else
                    <input type="checkbox" value="1" name="delete">
                    @endif
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