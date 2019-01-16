<?php

namespace App\Http\Controllers;

use App\Zipcodes;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ActionController extends Controller {
  public function top() {
    $region_names = ['北海道', '東北地方', '関東地方', '中部地方', '近畿地方', '中国地方', '四国地方', '九州地方'];

    include app_path() . '/variables/address_systems.php';

    return view('contents.top', [
      'region_names' => $region_names,
      'pref_names' => $pref_names,
    ]);
  }

  public function prefs_from_region($region_name) {
    $region_name_pref_names = [
      '東北地方' => ['青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'],
      '関東地方' => ['東京都', '神奈川県', '埼玉県', '千葉県', '茨城県', '栃木県', '群馬県', '山梨県'],
      '中部地方' => ['新潟県', '長野県', '富山県', '石川県', '福井県', '愛知県', '岐阜県', '静岡県', '三重県'],
      '近畿地方' => ['大阪府', '兵庫県', '京都府', '滋賀県', '奈良県', '和歌山県'],
      '中国地方' => ['鳥取県', '島根県', '岡山県', '広島県', '山口県'],
      '四国地方' => ['徳島県', '香川県', '愛知県', '高知県'],
      '九州地方' => ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'],
    ];

    return view('contents.prefs_from_region', [
      'region_name' => $region_name,
      'pref_names' => $region_name_pref_names[$region_name],
    ]);
  }

  public function cities_from_pref($pref_name) {
    //県名を元に、市名一覧を表示する。

    $cities = Zipcodes::select('city', 'city_kana')
      ->where('pref', $pref_name)
      ->groupBy('city', 'city_kana')
      ->orderBy('city_kana')
      ->get();

    include app_path() . '/functions/syllabary_kana.php';
    $syllabary_cities = getGroupBySyllabary($cities, 'city_kana');

    return view('contents.cities_from_pref', [
      'pref_name' => $pref_name,
      'syllabary_cities' => $syllabary_cities,
    ]);
  }

  public function streets_from_city($pref_name, $city_name) {
    //市名を元に、町域一覧を表示する。その時、五十音順に区分けして表示したい。

    $streets = Zipcodes::select('id', 'street', 'street_kana')
      ->where('city', $city_name)
      ->groupBy('id', 'street', 'street_kana')
      ->orderBy('street_kana')
      ->get();

    include app_path() . '/functions/syllabary_kana.php';
    $syllabary_streets = getGroupBySyllabary($streets, 'street_kana');

    return view('contents.streets_from_city', [
      'pref_name' => $pref_name,
      'city_name' => $city_name,
      'syllabary_streets' => $syllabary_streets,
    ]);
  }

  public function complete_address($id) {

    $address = Zipcodes::where('id', $id)
      ->first();

    return view('contents.complete_address', [
      'address' => $address,
    ]);
  }

  public function search_from_input(Request $request) {

    $pref_name = $request->pref_name;
    $city_street_kw = $request->city_street_kw;

    $addresses = Zipcodes::select('pref', 'city', 'city_kana')
      ->where('pref', $pref_name)
      ->whereRaw("concat(city, street) like '%{$city_street_kw}%'")
      ->groupBy('pref', 'city', 'city_kana')
      ->orderBy('city_kana')
      ->get();

		//市名が複数存在する場合は、再検索ページヘ。
    if ($addresses->count() > 1) {
      include app_path() . '/variables/address_systems.php';

      return view('contents.research_input', [
        'pref_name' => $pref_name,
        'city_street_kw' => $city_street_kw,
        'addresses' => $addresses,
        'pref_names' => $pref_names,
      ]);
    }

    $streets = Zipcodes::select('id', 'pref', 'city', 'street', 'street_kana')
      ->where('pref', $pref_name)
      ->whereRaw("concat(city, street) like '%{$city_street_kw}%'")
      ->groupBy('id', 'pref', 'city', 'street', 'street_kana')
      ->orderBy('street_kana')
      ->get();

    include app_path() . '/functions/syllabary_kana.php';
    $syllabary_streets = getGroupBySyllabary($streets, 'street_kana');

    return view('contents.streets_from_city', [
      'pref_name' => $streets[0]->pref,
      'city_name' => $streets[0]->city,
      'syllabary_streets' => $syllabary_streets,
    ]);
  }

  public function search_from_zipcode(Request $request) {

    $zipcode = $request->zipcode;

    $addresses = Zipcodes::select('pref', 'city', 'city_kana')
      ->where('zipcode', 'like', "{$zipcode}%")
      ->groupBy('pref', 'city', 'city_kana')
      ->orderBy('city_kana')
      ->get();

    if ($addresses->count() > 1) {
      return view('contents.research_zipcode', [
        'zipcode' => $zipcode,
        'addresses' => $addresses,
      ]);
    }

    $streets = Zipcodes::select('id', 'pref', 'city', 'street', 'street_kana')
      ->where('zipcode', 'like', "{$zipcode}%")
      ->groupBy('id', 'pref', 'city', 'street', 'street_kana')
      ->orderBy('street_kana')
      ->get();

    include app_path() . '/functions/syllabary_kana.php';
    $syllabary_streets = getGroupBySyllabary($streets, 'street_kana');

    return view('contents.streets_from_zipcode', [
      'zipcode' => $zipcode,
      'pref_name' => $streets[0]->pref,
      'city_name' => $streets[0]->city,
      'syllabary_streets' => $syllabary_streets,
    ]);
  }

}
