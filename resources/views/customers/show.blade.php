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
    <!--以下にミスがある、引数を渡してあげないとあかん-->
    <button type="button" onclick="location.href='{{ route('customers.edit', $customer->id),}}'">編集画面</button><br>
    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false}">
    </form>

    <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧へ戻る</button>
@endsection
