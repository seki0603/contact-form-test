@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('title')
confirm
@endsection

@section('content')
<form class="form" action="{{ route('contacts.store') }}" method="POST">
  @csrf
  <div class="confirm-table">
    <table class="confirm-table__inner">

      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text">
          <div>{{ $contact->last_name }} {{ $contact->first_name }}</div>
          <input type="hidden" name="last_name" value="{{ $contact->last_name }}">
          <input type="hidden" name="first_name" value="{{ $contact->first_name }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td class="confirm-table__text">
          <p>{{ $contact->gender_label }}
          <p>
            <input type="hidden" name="gender" value="{{ $contact->gender }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text">
          <div>{{ $contact->email }}</div>
          <input type="hidden" name="email" value="{{ $contact->email }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__text">
          <div>{{ $contact->tel }}</div>
          <input type="hidden" name="tel" value="{{ $contact->tel }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">住所</th>
        <td class="confirm-table__text">
          <div>{{ $contact->address }}</div>
          <input type="hidden" name="address" value="{{ $contact->address }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__text">
          <div>{{ $contact->building }}</div>
          <input type="hidden" name="building" value="{{ $contact->building }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせの種類</th>
        <td class="confirm-table__text">
          <div>{{ $contact->category->content }}</div>
          <input type="hidden" name="category_id" value="{{ $contact->category_id }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__text">
          <div>{{ $contact->detail }}</div>
          <input type="hidden" name="detail" value="{{ $contact->detail }}">
        </td>
      </tr>
    </table>
  </div>

  <div class="button__wrapper">
    <div class="form__button">
      <button class="form__button-submit" type="submit" name="send">送信</button>
    </div>
    <div class="return__button">
      <button class="return__button-submit" type="submit" name="return">修正</button>
    </div>
  </div>
</form>

@endsection