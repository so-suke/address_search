県名から市の一覧。
select 	
from zipcodes
where pref='北海道'
group by city, city_kana
order by city_kana
limit 50

市名から町域の一覧。
select id, street, street_kana
from zipcodes
where city='赤平市'
group by id, street, street_kana
order by street_kana

町域リンクから
select *
from zipcodes
where id=3

■住所で検索
(一意に絞れる)
select *
from zipcodes
where pref='長野県' and concat(city, street) like '%更科%'

(市名が複数有るかチェック。市名取得→市名が複数有る→ユーザに選択してもらう、市名が単数→町域グループ化で取得)
(laravelでカウント)
select city
from zipcodes
where pref='長野県' and concat(city, street) like '%中野%'
group by city
limit 50

select city
from zipcodes
where pref='長野県' and concat(city, street) like '%市%'
group by city
limit 50

select *
from zipcodes
where pref='長野県' and concat(city, street) like '%中野市%'
limit 50

select street, street_kana
from zipcodes
where pref='長野県' and concat(city, street) like '%中野市%'
group by street, street_kana
order by street_kana
limit 50

■郵便番号から
●市名カウント
select city
from zipcodes
where zipcode like '452%'
group by city
limit 50
●1なら
select id, street, street_kana
from zipcodes
where zipcode like '383%'
group by id, street, street_kana
order by street_kana
limit 50
