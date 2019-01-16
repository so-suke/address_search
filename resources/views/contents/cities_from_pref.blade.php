@extends('layouts.app')

@section('content')

@include('shares.title_wrap', ['first_title' => '郵便番号検索', 'second_title' => "{$pref_name}の郵便番号"])

<ul class="accordion mb-4">
  @foreach ($syllabary_cities as $syllabary => $cities)
  <li class="card mb-3">
    @include('shares.selected_bar')

    <div id="collapse{{ $syllabary }}" class="collapse">
      <ul class="card-body p-2">
        @foreach ($cities as $city)
        <li class="mb-2">
          <table class="table table-sm table-bordered mb-0">
            <tbody>
              <tr>
                <th class="my-th" scope="row">
                  <a href="{{ route('streets_from_city', ['pref_name' => $pref_name, 'city_name' => $city->city]) }}">{{ $city->city }}</a>
                </th>
                <td>{{ $city->city_kana }}</td>
              </tr>
            </tbody>
          </table>
        </li>
        @endforeach
      </ul>
    </div>
  </li>
  @endforeach

</ul>

@include('shares.to_top_btn')

@endsection
