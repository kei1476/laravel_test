@extends('layouts.default')
@section('title','入力画面')

@section('content')
<h1>内容確認</h1>
<form action="/complete" method="POST">
    @csrf
    <table>
        <tr>
            <th class="form-header">お名前</th>
            <td>
                {{$inputs['firstname']}}
                {{$inputs['lastname']}}
            </td>
        </tr>
        <tr>
            <th class="form-header">性別</th>
            <td>
                @if($inputs['gender'] === '1')
                男性
                @else
                女性
                @endif
            </td>
        </tr>
        <tr>
            <th class="form-header">メールアドレス</th>
            <td>{{$inputs['email']}}</td>
        </tr>
        <tr>
            <th class="form-header">郵便番号</th>
            <td>{{$inputs['postcode']}}</td>
        </tr>
        <tr>
            <th class="form-header">住所</th>
            <td>{{$inputs['address']}}</td>
        </tr>
        <tr>
            <th class="form-header">建物名</th>
            <td>{{$inputs['building_name']}}</td>
        </tr>
        <tr>
            <th class="form-header">お問い合わせ内容</th>
            <td>{{$inputs['opinion']}}</td>
        </tr>
    </table>
    <input type="hidden" name="fullname" value="{{$inputs['firstname'].$inputs['lastname']}}">
    <input type="hidden" name="firstname" value="{{$inputs['firstname']}}">
    <input type="hidden" name="lastname" value="{{$inputs['lastname']}}">
    <input type="hidden" name="gender" value="{{$inputs['gender']}}">
    <input type="hidden" name="email" value="{{$inputs['email']}}">
    <input type="hidden" name="postcode" value="{{$inputs['postcode']}}">
    <input type="hidden" name="address" value="{{$inputs['address']}}">
    <input type="hidden" name="building_name" value="{{$inputs['building_name']}}">
    <input type="hidden" name="opinion" value="{{$inputs['opinion']}}">
    <div class="button-area">
        <button type="submit" name="btn">送信</button>
        <form action="/"><button type="submit" name="btn" value="back" class="back-btn">修正</button></form>
    </div>
</form>
@endsection
