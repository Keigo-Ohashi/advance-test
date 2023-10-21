@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
  <div class="contact-form__content">

    <div class="contact-form__heading">
      <h2>お問い合わせ</h2>
    </div>

    <form class="form" action="/confirm" method="post">
      @csrf

      {{-- 名前 --}}
      <div class="form__group">

        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content form__group-name">

          <div class="form__group-family-name">

            <div class="form__input-text">
              <input type="text" name="family_name" value="{{ old('family_name') }}" required>
            </div>

            @error('family_name')
              <div class="form__input-error">
                {{ $message }}
              </div>
            @enderror

            <div class="form__input-example">
              <span>例) 山田</span>
            </div>

          </div>

          <div class="form__group-last-name">

            <div class="form__input-text">
              <input type="text" name="last_name" value="{{ old('last_name') }}" required>
            </div>

            @error('last_name')
              <div class="form__input-error">
                {{ $message }}
              </div>
            @enderror

            <div class="form__input-example">
              <span>例) 太郎</span>
            </div>

          </div>
        </div>

      </div>

      {{-- 性別 --}}
      <div class="form__group form__group-gender">

        <div class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-gender">
            
            <input type="radio" class="radio-button" id="gender-choice-male" name="gender" value=1 @if (old('gender') != 2) checked @endif>
            <label class="radio-label" for="gender-choice-male">男性</label>

            <input type="radio" class="radio-button" id="gender-choice-female" name="gender" value=2 @if (old('gender') == 2) checked @endif>
            <label class="radio-label" for="gender-choice-female">女性</label>

          </div>

          @error('gender')
            <div class="form__input-error">
              {{ $message }}
            </div>
          @enderror

        </div>

      </div>

      {{-- アドレス --}}
      <div class="form__group">

        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-text">
            <input type="email" name="email" value="{{ old('email') }}" required>
          </div>

          @error('email')
            <div class="form__input-error">
              {{ $message }}
            </div>
          @enderror

          <div class="form__input-example">
            <span>例) test@example.com</span>
          </div>

        </div>

      </div>

      {{-- 郵便番号 --}}
      <div class="form__group">

        <div class="form__group-title">
          <span class="form__label--item">郵便番号</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-postcode">

            <div class="postcode-mark">
              <span>〒</span>
            </div>

            <input type="text" name="postcode" value="{{ old('postcode') }}" required pattern="[0-9]{3}-?[0-9]{4}" title="000-0000の形式で入力してください。">

          </div>

          @error('postcode')
            <div class="form__input-error">
              {{ $message }}
            </div>
          @enderror

          <div class="form__input-example">
            <span>例) 123-4567</span>
          </div>

        </div>

      </div>

      {{-- 住所(番地まで) --}}
      <div class="form__group">

        <div class="form__group-title">
          <span class="form__label--item">住所</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-text">
            <input type="text" name="address" value="{{ old('address') }}" required>
          </div>

          @error('address')
            <div class="form__input-error">
              {{ $message }}
            </div>
          @enderror

          <div class="form__input-example">
            <span>例) 東京都渋谷区千駄ヶ谷1-2-3</span>
          </div>

        </div>

      </div>

      {{-- 住所(建物名) --}}
      <div class="form__group">

        <div class="form__group-title">
          <span class="form__label--item">建物名</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-text">
            <input type="text" name="building_name" value="{{ old('building_name') }}">
          </div>

          <div class="form__input-example">
            <span>例) 千駄ヶ谷マンション101</span>
          </div>

        </div>

      </div>

      {{-- ご意見 --}}
      <div class="form__group form__group-opinion">

        <div class="form__group-title">
          <span class="form__label--item">ご意見</span>
          <span class="form__label--required">※</span>
        </div>

        <div class="form__group-content">

          <div class="form__input-textarea">
            <textarea name="opinion" cols="30" rows="4" required>{{ old('opinion') }}</textarea>
          </div>

          @error('opinion')
            <div class="form__input-error">
              {{ $message }}
            </div>
          @enderror

        </div>

      </div>

      <div class="form__button">

        <button class="form__button-submit" type="submit">確認</button>

      </div>
    </form>

  </div>
@endsection
