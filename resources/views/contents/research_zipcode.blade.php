@extends('layouts.app')

@section('content')
<div class="border border-secondary p-2 mb-3">
  <span class="d-block h4">郵便番号検索</span>
  <span class="d-block h5">郵便番号 {{ $zipcode }} の検索結果</span>
</div>

<p>以下の市区町村に該当する名称があります。 市区町村名を選択してください。</p>

<ul class="d-flex flex-column">
  @foreach ($addresses as $address)
  <li class="p-2 d-flex">
    <a class="d-block w-25" href="{{ route('streets_from_city', ['pref_name' => $address->pref, 'city_name' => $address->city]) }}">{{ $address->pref }}{{ $address->city }}</a>
    <span class="d-block">{{ $address->city_kana }}</span>
  </li>
  @endforeach
</ul>

<div class="subTitleWrap my-2 p-2">
  <span class="subTitle">もう一度検索する</span>
</div>

<div class="mb-3">
  <input type="text" class="form-control mb-2" placeholder="郵便番号を入力">
  <button type="button" class="btn btn-danger btn-block">該当地域を検索</button>
  <span class="d-block">例）1010001</span>
  <span class="d-block">※ 3けた以上の数字を入力してください</span>
</div>

@include('shares.to_top_btn')

@endsection
