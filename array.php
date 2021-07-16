<?php

/**
* 配列機能のまとめ
*/

/**
* 基本 配列の変数作成
*
* $area = [];  配列に値を格納。[]はarray();でも可。
* 
*/

$area = [
	'Tokyo',
	'Chiba'
];

var_dump($area);


$field = [
	// 連想配列に値を設定。
	'Tokyo' => 'Ginza',
	'Chiba' => 'Kashiwa.'
];

echo nl2br($field['Tokyo']."\n");


/**
* 多次元配列
*
* 配列の中に配列を格納。
* 
*/

$numbers = [
    'odd' => ['one','three', 'five'],
    'even' => ['two','four', 'six']
];

echo nl2br($numbers['even'][0]."\n");


/**
* 配列の繰り返し
*
* 条件を満たすまで同じ処理をくり返す。
* 
*/

//foreach
$prefectures = [
    'Tokyo' => '東京',
    'Chiba' => '千葉',
    'Kyoto' => '京都'
];

// 配列の要素がある分だけ繰り返し
// $配列の変数 as $各要素のキー => $各要素が格納された変数
foreach ($prefectures as $key => $value) {
    echo nl2br($key . '：' . $value . "\n");
}


/**
* 配列の操作
*
* 配列の追加、削除、検索、取得、変換、検索(正規表現)
* 
*/

// 配列の追加
// [] 通常の配列に追加(セット済みのキーを使い回すと上書きされる)
$prefectures['Fukuoka'] = '福岡';
// += 複数の配列の追加(既にセットしている値は上書きされない)
$prefectures += ['Kanagawa'=>'神奈川','Chiba'=>'柏','Kasiwa'=>'柏','Kasiwa02'=>'柏'];
var_dump($prefectures);


// 配列の削除
// unset 特定の値の削除
unset($prefectures['Fukuoka']);
// array_unique 重複した値の削除
$result = array_unique($prefectures);
var_dump($result);


// 配列の検索
// array_key_exists 配列のキーが存在するかどうか調べる(処理は違うがissetでも代用は可能？)
if ( array_key_exists('Tokyo', $prefectures) ) {
	echo nl2br("配列内にTokyoというキーは存在します\n");
}
// in_array 配列内に該当データが存在するかどうか調べる
if ( in_array('東京', $prefectures) ) {
    echo nl2br("配列内に東京は存在します\n");
}


// 配列の取得
// count 配列の要素数を取得する
echo nl2br(count($result)."\n");
echo nl2br(count($prefectures)."\n");


// 配列の変換
// implode 配列を文字列に変換する
$implode = implode(',', $prefectures);
echo $implode;

// explode 文字列を配列に変換する
$explode = explode(",", $implode);
var_dump($explode);


// 配列の検索(正規表現)
// preg_match_all すべて検索にマッチする文字列を繰り返し見つける
$string = "https://www.google.co.jp/ https://ja.wikipedia.org/ https://www.youtube.com";
// 部分抽出する際に任意のキーを付与
$regex = "/(?<URL>https:\/\/[a-z\.]*(?<TLD>\.[a-z]{2,3})\/?)/";
preg_match_all($regex, $string, $match, PREG_SET_ORDER);

foreach ($match as $value) {
    var_dump ($value['URL']);
    var_dump ($value['TLD']);
}