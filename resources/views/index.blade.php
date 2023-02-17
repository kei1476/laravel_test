@extends('layouts.default')
@section('title','入力画面')

@section('content')
<h1>お問い合わせ</h1>
<form action="/confirm" method="POST" id="contact-form" class="h-adr">
    <span class="p-country-name" style="display:none;">Japan</span>
    @csrf

    @if(count($errors)>0)
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <table>
        <tr>
            <th class="form-header"><span class="required">お名前</span></th>
            <td class="name-area">
                <div class="fullname-area">
                    <input type="text" name="firstname" class="fullname validate[required]" value="{{old('firstname')}}">
                    <p class="example">例）山田</p>
                </div>
                <div class="fullname-area">
                    <input type="text" name="lastname" class="fullname validate[required]" value="{{old('lastname')}}">
                    <p class="example">例）太郎</p>
                </div>
            </td>
        </tr>
        <tr>
            <th class="form-header"><span class="required">性別</span></th>
            <td>
                <label><input type="radio" name="gender" class="radio-btn" value="1" checked >男性</label>
                <label><input type="radio" name="gender" class="radio-btn" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性</label>
            </td>
        </tr>
        <tr>
            <th class="form-header"><span class="required">メールアドレス</span></th>
            <td><input type="email" name="email" class="form-text validate[required],custom[email]" value="{{old('email')}}">
            <p class="example">例）test@evample.com</p></td>
        </tr>
        <tr>
            <th class="form-header"><span class="required">郵便番号</span></th>
            <td>
                <div class="post-area">
                    <span class="post-mark">〒</span>
                    <input type="text" name="postcode" id="postcode" class="form-text validate[required] p-postal-code" maxlength="8" value="{{old('postcode')}}">
                </div>
                <p class="example">例）123-4567</p>
            </td>
        </tr>
        <tr>
            <th class="form-header"><span class="required">住所</span></th>
            <td><input type="text" name="address" class="form-text validate[required] p-region p-locality p-street-address p-extended-address" value="{{old('address')}}">
            <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p></td>
        </tr>
        <tr>
            <th class="form-header">建物名</th>
            <td><input type="text" name="building_name" class="form-text" value="{{old('building_name')}}">
            <p class="example">例）千駄ヶ谷マンション101</p></td>
        </tr>
        <tr>
            <th class="form-header"><span class="required">ご意見</span></th>
            <td><textarea name="opinion" class="form-textarea validate[required,maxSize[120]]">{{old('opinion')}}</textarea></td>
        </tr>
    </table>
    <div class="button-area">
        <button type="submit">確認</button>
    </div>
</form>
@endsection
