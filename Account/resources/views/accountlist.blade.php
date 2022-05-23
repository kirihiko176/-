<!DOCTYPE html>
<html>
    <head>
        <title>アカウント一覧 | ポートフォリオ</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        @if (session('message'))
        <p style='color:#cc6262';>
        {{ session('message') }}
        </p>
        @endif
        <form  method="GET" action="accountlist">
        @csrf
        <table>
            <tbody>
            <th>アカウントID</th>
            <td>
            @if(isset($account_id))
                <input type="text"  value="{{account_id}}" name="account_id">
            @else
                <input type="text"  value="" name="account_id">
            @endif
            </td>           

            <th>ロック</th>
            <td>
            @if(isset($lock))
                @if($lock ==1)
                <input type="checkbox" name="lock" value="1" checked>
                @else
                <input type="checkbox" name="lock" value="1">
                @endif
            @else
            <input type="checkbox" name="lock" value="1">
            @endif
            </td>

            <th>削除</th>
            <td>
            @if(isset($delete))
                @if($delete ==1)
                <input type="checkbox" name="delete" value="1" checked>
                @else
                <input type="checkbox" name="delete" value="1">
                @endif
            @else
            <input type="checkbox" name="delete" value="1">
            @endif            
            </td>      
            
            <th>管理者</th>
            <td>
            @if(isset($admin))
                @if($admin ==1)
                <input type="checkbox" name="admin" value="1" checked>
                @else
                <input type="checkbox" name="admin" value="1">
                @endif
            @else
            <input type="checkbox" name="admin" value="1">
            @endif          
            </td>          
            </tbody>
        </table>
        <button type="submit">検索</button>
        </form>

        <br>
        <br>
        <br>
        <form method="post" action="accountrenewal">
        @csrf
        <table>
            <thead>
            <tr>
                <th></th>
                <th>アカウントID</th>
                <th>ロック</th>
                <th>削除</th>
                <th>管理者</th>
            </tr>
            </thead>

            <tbody>
            @if(isset($results))
                @foreach($results as $result)
                <tr>
                    <td><input type="radio" name="account_id" value="{{$result->account_id}}"></td>
                    <th>{{$result->account_id}}</th>

                    @if($result->lock == 1)
                    <td>ロック</td>
                    @else
                    <td></td>
                    @endif

                    @if($result->delete == 1)
                    <td>削除</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($result->admin == 1)
                    <td>管理者</td>
                    @else
                    <td>一般</td>
                    @endif
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        <ul>
            <li>
                <a href="../accountcreate">アカウント作成</a>
            </li>
            <li>
                <button type="submit">アカウント更新</a>
            </li>
        </ul>    
        </form>

    </body>
</html>