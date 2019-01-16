@extends('layouts.app')

@section('content')

@include('shares.title_wrap', ['first_title' => '郵便番号検索', 'second_title' => "$region_name - 都道府県から検索する"])

<ul class="d-flex flex-column mb-3">
  @foreach ($pref_names as $pref_name)
  <li class="mb-2 border border-danger rounded">
    <a class="px-2 py-2 d-block" href="{{ route('cities_from_pref', $pref_name) }}">{{ $pref_name }}</a>
  </li>
  @endforeach
</ul>

@include('shares.to_top_btn')

@endsection
