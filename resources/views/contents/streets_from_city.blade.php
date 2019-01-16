@extends('layouts.app')

@section('content')

<div class="titleWrap titleWrapPad balloon">
  <span class="d-block h4">郵便番号検索</span>
  <div class="subTitle d-block">
    <a class="text-danger" href="{{ route('cities_from_pref', ['pref_name' => $pref_name]) }}">{{ $pref_name }}</a>
    >
		<span class="text-danger">{{ $city_name }}</span>
  </div>
</div>


@include('shares.syllabary_streets')

@include('shares.to_top_btn')

@endsection
