@extends('layouts.app')

@section('content')

<div class="titleWrap titleWrapPad balloon">
  <span class="d-block h4">郵便番号検索</span>
  <p class="subTitle mb-0">
    <span class="s">
      <a href="{{ route('cities_from_pref', ['pref_name' => $address->pref]) }}">{{ $address->pref }}</a>
      >
      <a href="{{ route('streets_from_city', ['pref_name' => $address->pref, 'city_name' => $address->city]) }}">{{ $address->city }}</a>
      >
    </span>
    <br>
    {{ $address->street }}の郵便番号
  </p>
  <span class="d-block ml-2">{{ $address->street_kana }}</span>

</div>

<div class="d-flex border border-danger mb-3">
  <div class="p-2 border-right border-danger">郵便番号・住所</div>
  <div class="d-flex flex-column w-100">
    <span class="p-2 border-bottom border-danger">〒{{ $address->zipcode }}</span>
    <div class="d-flex flex-column p-2">
      <span>{{ $address->pref }}</span>
      <span>{{ $address->city }}</span>
      <span>{{ $address->street }}</span>
      <span>{{ $address->street_kana }}</span>
    </div>
  </div>
</div>

@include('shares.to_top_btn')

@endsection
