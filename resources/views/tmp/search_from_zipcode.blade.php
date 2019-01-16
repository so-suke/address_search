@extends('layouts.app')

@section('csses')
@parent
<link href="{{ asset('css/contents/search_from_zipcode.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="border border-secondary p-2 mb-3">
  <span class="d-block h4">郵便番号検索</span>
  <span class="d-block h5">北海道の郵便番号</span>
</div>

<div class="subTitleWrap my-2 p-2">
  <span class="subTitle">長野県</span>
</div>

<ul class="accordion mb-4" id="accordionExample">
  <li class="card">
    <div class="card-header">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
          あ行
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show">
      <ul class="card-body">
        <li class="d-flex flex-column mb-2">
          <table class="table table-sm table-bordered">
            <tbody>
              <tr>
                <th class="sfz-th" scope="row">郵便番号</th>
                <td>380-0000</td>
              </tr>
              <tr>
                <th class="sfz-th" scope="row">都道府県</th>
                <td>長野県</td>
              </tr>
              <tr>
                <th class="sfz-th" scope="row">市区町村</th>
                <td>中野市</td>
              </tr>
              <tr>
                <th class="sfz-th" scope="row">町域</th>
                <td>赤岩(アカイワ)</td>
              </tr>
            </tbody>
          </table>
        </li>
      </ul>
    </div>
  </li>
</ul>

@include('shares.to_top_btn')


@endsection
