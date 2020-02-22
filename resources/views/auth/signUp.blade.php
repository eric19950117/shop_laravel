{{-- 檔案位置: resources/views/auth/signUp.blade.php --}}
{{-- TODO: auth.signUp模板接到控制器傳入的$title變數資料 -> 使用{{}}印出 --}}
{{-- {{ $title }} -> htmlentities防止XSS攻擊 -> 會將變數資料的特殊字元做編碼轉換 --}}
{{-- {!! $title !!} -> 不做編碼轉換直接輸出的方法--}}

{{-- 指定繼承 layput.master 母模板 --}}
@extends('layout.master')

{{-- 傳送資料到母模板，並指定變數為title --}}
@section('title', $title)

{{-- 傳送到母模板，並指定變數為content --}}
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="/user/auth/sign-up" method="POST">
        {{-- TODO: 手動加入 csrf_token 隱藏欄位，欄位變數名稱為 _token --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{-- TODO: 自動產生 csrf_token 隱藏欄位 --}}
        {{-- {!! csrf_field() !!} --}}

        <label>
            暱稱：
            <input type="text" name="nickname" placeholder="暱稱">
        </label>

        <label>
            Email：
            <input type="text" name="email" placeholder="Email">
        </label>

        <label>
            密碼：
            <input type="password" name="password" placeholder="密碼">
        </label>

        <label>
            確認密碼：
            <input type="password" name="password_confirmation" placeholder="確認密碼">
        </label>

        <label>
            {{-- FIXME: 這邊為了能快速demo，所以在前台統一新增一班會員或管理者 -> 正式專案不能這樣做 --}}
            帳號類型：
            <select name="type">
                <option value="G">一般會員</option>
                <option value="A">管理者</option>
            </select>
        </label>

        <button type="submit">註冊</button>

    </form>

</div>

@endsection
