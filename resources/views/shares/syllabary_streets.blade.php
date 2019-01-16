<ul class="accordion mb-4">
  @foreach ($syllabary_streets as $syllabary => $streets)
  <li class="card mb-3">
		@include('shares.selected_bar')

    <div id="collapse{{ $syllabary }}" class="collapse">
      <ul class="card-body p-2">
        @foreach ($streets as $street)
        <li class="mb-2">
          <table class="table table-sm table-bordered mb-0">
            <tbody>
              <tr>
                <th class="my-th" scope="row">市区町村</th>
                <td>{{ $city_name }}</td>
              </tr>
              <tr>
                <th class="my-th" scope="row">町域</th>
                <td>
                  <a class="d-block" href="{{ route('complete_address', ['id' => $street->id]) }}">{{ $street->street }}</a>
                  <span class="d-block">{{ $street->street_kana }}</span>
                </td>
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
