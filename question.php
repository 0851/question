
<?php
$questions = [
	[
		"answer" => "向信息安全部汇报",
		"question" => "发现同事a电脑中毒应怎么办？",
		"choose" => [
			"不关我事，继续办公",
			"协助同事查找问题",
			"向信息安全部汇报",
			"用U盘把同事电脑里文件备份到自己电脑" 
		]
	],
	[
		"answer" => "向信息安全部汇报",
		"question" => "发现同事b电脑中毒应怎么办？",
		"choose" => [
			"不关我事，继续办公",
			"协助同事查找问题",
			"向信息安全部汇报",
			"用U盘把同事电脑里文件备份到自己电脑" 
		]
	] 
];

$rand_keys = array_rand($questions, 10);

$items = array_map(function ($item) use ($questions) {
  return $questions[$item];
}, $rand_keys);


echo json_encode($items);

?>