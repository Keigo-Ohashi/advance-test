@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('main')
  <div class="confirm__content">

    <div class="confirm__heading">
      <h2>内容確認</h2>
    </div>

    <form action="/complete" method="post">
      @csrf

      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">お名前</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="family_name" value="{{ $contact['family_name'] }}">
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
          </div>

          <div class="confirm__text">
            <span>{{ $contact['family_name'] }}&emsp;{{ $contact['last_name'] }}</span>
          </div>

        </div>

      </div>

      {{-- 性別 --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">性別</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
          </div>

          <div class="confirm__text">

            @if ($contact['gender'] == 1)
              <span>男性</span>
            @else
              <span>女性</span>
            @endif

          </div>

        </div>

      </div>

      {{-- アドレス --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">メールアドレス</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
          </div>

          <div class="confirm__text">
            <span>{{ $contact['email'] }}</span>
          </div>

        </div>

      </div>

      {{-- 郵便番号 --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">郵便番号</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
          </div>

          <div class="confirm__text">
            {{ $contact['postcode'] }}
          </div>

        </div>

      </div>

      {{-- 住所(番地まで) --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">住所</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
          </div>

          <div class="confirm__text">
            {{ $contact['address'] }}
          </div>

        </div>

      </div>

      {{-- 住所(建物名) --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">建物名</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
          </div>

          <div class="confirm__text">
            {{ $contact['building_name'] }}
          </div>

        </div>

      </div>

      {{-- ご意見 --}}
      <div class="confirm__group">

        <div class="confirm__group-title">
          <span class="confirm__label--item">ご意見</span>
        </div>

        <div class="confirm__group-content">

          <div class="confirm__input-hidden">
            <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">
          </div>

          <div class="confirm__text confirm__textarea">
            {{ $contact['opinion'] }}
          </div>

        </div>

      </div>

      <div class="confirm__button">

        <button class="confirm__button-submit" type="submit" name='submit_status' value="submit">送信</button>
        <button class="confirm__button-correct" type="submit" name='submit_status' value="confirm">修正する</button>

      </div>

    </form>

  </div>
@endsection
