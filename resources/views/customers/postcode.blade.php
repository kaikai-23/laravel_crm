@extends('layouts.main')

@section('title', '郵便番号検索画面')

@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('customers.create') }}" method="get">
        <input type="text" name="postcode" id="postcode" placeholder="検索したい郵便番号">
        <input type="submit" lavel="検索">
    </form>
@endsection

