@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('title')
Contact
@endsection

@section('content')
<form class="form" action="/contacts/confirm" method="POST">
  @csrf
  <div class="form__group">
    <div class="form__title">
      お名前<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-name">
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田" />
        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎" />
      </div>
      <div class="form__error">
        @error('last_name')
        {{ $message }}
        @enderror
        @error('first_name')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      性別<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-gender">
        <label class="form__input--radio">
          <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} checked />
          <span>男性</span>
        </label>
        <label class="form__input--radio">
          <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}/>
          <span>女性</span>
        </label>
        <label class="form__input--radio">
          <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}/>
          <span>その他</span>
        </label>
      </div>
      <div class="form__error">
        @error('gender')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      メールアドレス<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-text">
        <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
      </div>
      <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      電話番号<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-tel">
        <input type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="080" />
        -
        <input type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234" />
        -
        <input type="tel" name="tel3" value="{{ old('tel3')}}" placeholder="5678" />
      </div>
      <div class="form__error">
        @if ($errors->has('tel1'))
        {{ $errors->first('tel1') }}
        @elseif ($errors->first('tel2'))
        {{ $errors->first('tel2')}}
        @elseif ($errors->has('tel3'))
        {{ $errors->first('tel3') }}
        @endif
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      住所<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-text">
        <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" />
      </div>
      <div class="form__error">
        @error('address')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">建物名</div>
    <div class="form__group-content">
      <div class="form__input-text">
        <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101" />
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      お問い合わせの種類<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__select-wrapper">
        <select class="form__select" name="category_id">
          <option value="">選択してください</option>
          <option value="">商品の種類</option>
        </select>
      </div>
      <div class="form__error">
        <!-- バリデーション -->
      </div>
    </div>
  </div>
  <div class="form__group">
    <div class="form__title">
      お問い合わせ内容<span class="form__title--required">※</span>
    </div>
    <div class="form__group-content">
      <div class="form__input-textarea">
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
      </div>
      <div class="form__error">
        @error('detail')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>
  <div class="form__button">
    <button class="form__button-submit" type="submit">確認画面</button>
  </div>
</form>
@endsection