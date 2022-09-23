@extends('layouts.main')

@section('title', '顧客詳細画面')

@section('content')
    <h1>顧客詳細画面</h1>
    <table>
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->postcode }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->number }}</td>
        </tr>
    </table>
    <!--以下にミスがある-->
    <button type="button" onclick="location.href='{{ route('customers.edit')}}'">編集画面</button><br>
    <button type="button" onclick="location.href='{{ route('customers.destoroy') }}'">削除する</button><br>
    <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧へ戻る</button>
@endsection
