@extends('layouts.main')

@section('title', '郵便番号検索画面')

@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('customers.create') }}" method="get">
        {{-- @csrf --}}
        <div>
            <label for="postcode">郵便番号検索</label>
            <input type="text" name="postcode" id="postcode" placeholder="検索したい郵便番号" value="{{ old("postcode") }}">
        </div>
        <div>
            <input type="submit" value="検索" >
        </div>
    </form>
    <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
    

@endsection

