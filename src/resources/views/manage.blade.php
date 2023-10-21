@extends('layouts/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('main')
  <div class="page-title">
    <h2>管理システム</h2>
  </div>

  <div class="search-form">
    <form action="/search" class="form" method="get">
      <div class="form__row">

        <div class="form__group form__group-name">

          <div class="form__group-title">
            お名前
          </div>

          <div class="form__group-input">
            <input type="text" name="name" value="{{ $search['name'] }}">
          </div>

        </div>

        <div class="form__group">

          <div class="form__group-title" id="title-gender">
            性別
          </div>

          <input type="radio" class="radio-button" id="all" name="gender" value=0 @if ($search['gender'] == 0) checked @endif>
          <label class="radio-label" for="all">全て</label>

          <input type="radio" class="radio-button" id="male" name="gender" value=1 @if ($search['gender'] == 1) checked @endif>
          <label class="radio-label" for="male">男性</label>

          <input type="radio" class="radio-button" id="female" name="gender" value=2 @if ($search['gender'] == 2) checked @endif>
          <label class="radio-label" for="female">女性</label>

        </div>

      </div>

      <div class="form__row">

        <div class="form__group">

          <div class="form__group-title">
            登録日
          </div>

          <div class="form__group-input">
            <input type="date" name="date_start" value="{{ $search['date_start'] }}">
          </div>

          <div class="tilde center-all">
            <div class="tilde-inner">～</div>
          </div>

          <div class="form__group-input">
            <input type="date" name="date_last" value="{{ $search['date_last'] }}">
          </div>

        </div>

      </div>

      <div class="form__row">

        <div class="form__group">

          <div class="form__group-title">
            メールアドレス
          </div>

          <div class="form__group-input">
            <input type="email" name="email" value="{{ $search['email'] }}">
          </div>

        </div>

      </div>

      <div class="search-button">
        <button type="submit">検索</button>
      </div>

    </form>

    <div class="reset">
      <a href="manage">リセット</a>
    </div>


  </div>

  <div class="search-result">

    <div class="search-result__header">
      <div class="result-amount">
        <span>全{{ $results->total() }}件中&emsp;{{ $results->firstItem() }}-{{ $results->lastItem() }}件</span>
      </div>

      <div class="page-links">
        {{ $results->links() }}
      </div>

    </div>

    <div class="search-result__content">

      <table class="table">

        <tr class="titles">
          <th class="title">ID</th>
          <th class="title">お名前</th>
          <th class="title">性別</th>
          <th class="title">メールアドレス</th>
          <th class="title">ご意見</th>
          <th class="title"></th>
        </tr>

        @foreach ($results as $result)
          <tr class="result__row">

            <td class="result__item">
              {{ $result->id }}
            </td>

            <td class="result__item">
              {{ $result->fullname }}
            </td>

            <td class="result__item">
              @if ($result->gender == 1)
                男性
              @else
                女性
              @endif
            </td>

            <td class="result__item">
              {{ $result->email }}
            </td>

            <td class="result__item" id="limited-text">
              @if (mb_strlen($result->opinion) >= 25)
                {{ mb_substr($result->opinion, 0, 25) . '...' }}
              @else
                {{ $result->opinion }}
              @endif
            </td>

            <td class="result__item delete-button">
              <form action="delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $result->id }}">
                <button type="submit">削除</button>
              </form>
            </td>

          </tr>
        @endforeach

      </table>

    </div>


  </div>
@endsection
