<form action="{{ route('search_from_input') }}" method="POST">
  @csrf
  <div class="mb-2">
    <span>1.都道府県を選択</span>
    <select class="custom-select" name="pref_name">
      <option selected>都道府県を選択</option>
      @foreach ($pref_names as $key => $pref_name)
      <option value="{{ $pref_name }}">{{ $pref_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-2">
    <span>2.入力(例：千代田区)</span>
    <input type="text" class="form-control mb-2" name="city_street_kw" placeholder="市区町村・町名を入力">
  </div>
  <button type="submit" class="btn btn-danger btn-block">郵便番号を検索</button>
  <span>※よみがなで検索する場合は 、カタカナで入力してください</span>
</form>