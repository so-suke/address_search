@extends('layouts.app')

@section('content')

@include('shares.title_wrap', ['first_title' => '郵便番号検索', 'second_title' => "郵便番号 $zipcode の検索結果"])

<div class="subTitleWrap my-2 p-2">
  <span class="subTitle">{{ $pref_name }}</span>
</div>

@include('shares.syllabary_streets')

@include('shares.to_top_btn')

@endsection
