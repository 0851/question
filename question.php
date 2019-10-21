
<?php
$questions = [
	[
		"answer" => "adlkj1",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj2",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj3",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj4",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj5",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj6",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj7",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj8",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj9",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	],
	[
		"answer" => "adlkj10",
		"question" => "alksdjdd",
		"choose" => [
			"alksdjdddd",
			"alkddjd",
			"alkdjdd",
			"lkajdd",
			"alskd",
			"aklsdd" 
		]
	] 
];

$rand_keys = array_rand($questions, 10);

$items = array_map(function ($item) use ($questions) {
  return $questions[$item];
}, $rand_keys);


echo json_encode($items);

?>