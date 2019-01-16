@extends('layouts.app')

@section('content')

@include('shares.title_wrap', ['first_title' => '郵便番号検索', 'second_title' => '都道府県から検索する'])

<ul class="linkList2 mb-3">
  @foreach ($region_names as $region_name)
  @if ($region_name === '北海道')
  <li>
    <a href="{{ route('cities_from_pref', '北海道') }}">{{ $region_name }}</a>
  </li>
  @else
  <li>
    <a href="{{ route('prefs_from_region', ['region_name' => $region_name]) }}">{{ $region_name }}</a>
  </li>
  @endif
  @endforeach
</ul>

@include('shares.sub_title_wrap', ['title' => '住所で検索する'])

@include('shares.free_input_form')

@include('shares.sub_title_wrap', ['title' => '郵便番号から該当地域を検索する'])

<form action="{{ route('search_from_zipcode') }}" method="POST">
  @csrf
  <input type="text" class="form-control mb-2" placeholder="郵便番号を入力" name="zipcode" required>
  <button type="submit" class="btn btn-danger btn-block">該当地域を検索</button>
</form>
@endsection

@section('scripts')
@parent
@endsection
