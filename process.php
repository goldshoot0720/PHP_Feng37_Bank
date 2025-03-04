<?php
// 取得前端傳來的 JSON 字串
$inputJSON = file_get_contents('php://input');

// 解析 JSON 字串為 PHP 陣列
$inputData = json_decode($inputJSON, true);

// 確保解析成功
if ($inputData === null) {
    echo json_encode(["status" => "error", "message" => "JSON 解析失敗"]);
    exit;
}

// 示範：回傳獲取到的數據
$response = [
    "status" => "success",
    "received_data" => $inputData
];

// 回傳 JSON 格式的回應
// echo json_encode($response);

$myfile = fopen("bank_savings.txt", "w") or die("Unable to open file!");

	for ($i = 0; $i < 10; $i++)
    	{
        	fwrite($myfile, $response["received_data"][$i]);
		fwrite($myfile, "\n");
    	}
	fclose($myfile);
?>