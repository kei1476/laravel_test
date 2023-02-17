<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/search.css')  }}">
    <title>管理ページ</title>
</head>
<body>
        <div class="search-form-area">
            <h1 class="text-center display-3 mb-4">管理ページ</h1>
            <form action="/admin" method="GET" class="search-form form-inline">
                <div class="row form-group">
                    <div class="col-sm-7">
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label">お名前</label>
                            <div class="col-sm-9">
                                <input type="text" name="fullname" class="form-control" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <label  class="col-form-label col-sm-2">性別</label>
                            <div class="form-check col-sm-3">
                                <input type="radio" class="form-check-input mt-2" id="exampleRadios1" name="gender" value="3" checked >
                                <label for="exampleRadios1" class="col-form-label ms-1">
                                    全て
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <input type="radio" class="form-check-input mt-2" name="gender" id="exampleRadios2" value="1" >
                                <label for="exampleRadios2" class="col-form-label ms-1">
                                    男性
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <input type="radio" class="form-check-input mt-2" name="gender" id="exampleRadios3" value="2" >
                                <label for="exampleRadios3" class="col-form-label ms-1">
                                    女性
                                </label>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="date" class="col-sm-2 col-form-label">登録日</label>
                    <div class="col-sm-10">
                        <input type="date" name="date1">
                        <span>～</span>
                        <input type="date" name="date2">
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="mail" class="col-sm-2 col-form-label">メールアドレス</label>
                    <div class="col-sm-5">
                        <input type="text" id="mail" name="email" class="form-control">
                    </div>
                </div>
                <div class="button-area">
                    <button type="submit" class="search-btn">検索</button>
                </div>
                <a class="reset-btn" href="/admin">リセット</a>
            </form>

            @if(empty($users))
            <div class="pagination-area">
                <p class="page-nav">
                    全{{ $contacts->total() }}件中
                    {{ ($contacts->currentPage() -1) * $contacts->perPage() + 1}} -
                    {{ (($contacts->currentPage() -1) * $contacts->perPage() + 1) + (count($contacts) -1) }}件
                </p>
                {{ $contacts->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">お名前</th>
                        <th scope="col">性別</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">ご意見</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{$contact->id}}</th>
                        <td>{{$contact->fullname}}</td>
                        <td>
                            @if($user->gender === 1)
                            男性
                            @else
                            女性
                            @endif
                        </td>
                        <td>{{$contact->email}}</td>
                        <td style="max-width:200px;" title="{{$user->opinion}}">
                           <p class="opinion">{{ Str::limit($user->opinion, 50, '...') }}</p>
                        </td>
                        <td><a class="delete-btn" href="delete/{{$contact->id}}">削除</a></td>
                    </tr>
                    @endforeach

                @else
                    <div class="pagination-area">
                        <p class="page-nav">
                            全{{ $users->total() }}件中
                            {{ ($users->currentPage() -1) * $users->perPage() + 1}} -
                            {{ (($users->currentPage() -1) * $users->perPage() + 1) + (count($users) -1) }}件
                        </p>
                        {{ $users->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">お名前</th>
                                <th scope="col">性別</th>
                                <th scope="col">メールアドレス</th>
                                <th scope="col">ご意見</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->fullname}}</td>
                                <td>
                                    @if($user->gender === 1)
                                    男性
                                    @else
                                    女性
                                    @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td style="max-width:200px;" title="{{$user->opinion}}">
                                <p class="opinion" id="opinion">{{ Str::limit($user->opinion, 50, '...') }}</p>
                                </td>
                                <td><a href="delete/{{$user->id}}" class="delete-btn" onclick="deleteContact()">削除</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
        </div>
<script>
    function deleteContact() {
        if (confirm('本当に削除しますか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
</body>
</html>
