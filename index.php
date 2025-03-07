<!DOCTYPE html>
<html>
<head>
<title>PHP_Feng37_Bank</title>
<script type="text/javascript" src="myjs.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="text-align:center;">
<div class="container-fluid p-1 bg-primary text-white text-center">
  <h1>PHP_鋒兄三七_銀行</h1>
  <p>By
  	<?php
		date_default_timezone_set("Asia/Taipei");
		echo date("F d Y H:i:s",filemtime("bank_savings.txt"));
	?>
  </p> 
</div>
<br>
<div class="container mt-0">
  <div class="row">
    <div class="col-sm-12">
      <h3>
      	<label for="financial_institution">金融機構：</label>
      </h3>
      <p>
      <select id="financial_institution" onchange="Select_Onchange()">
	<optgroup label="泛公股：">
	<option>(006)合作金庫(5880)</option>
    	<option>(017)兆豐銀行(2886)</option>
	<optgroup label="民營銀行：">
    	<option>(013)國泰世華(2882)</option>
    	<option>(048)王道銀行(2897)</option>
    	<option>(103)新光銀行(2888)</option>
	<option>(808)玉山銀行(2884)</option>
    	<option>(812)台新銀行(2887)</option>
    	<option>(822)中國信託(2891)</option>
	<optgroup label="郵局：">
    	<option>(700)中華郵政</option>
	<optgroup label="電子支付：">
	<option>(396)街口支付(6038)</option>
	</select>
     </p>	
    </div>
    <div class="col-sm-12">
      <h3>
      	<label for="saving">存款金額：</label>
      </h3>
      <p>
      	<input type="text" id="saving" name="saving" required minlength="1" maxlength="10" size="10"/>
      </p>
    </div>
    <div class="col-sm-12">
      <h3>
	<label for="sum_saving">累積存款：</label>
      </h3>        
      <p>
    	<label id="sum_saving"></label>
     </p>
    </div>
    </p>
    <div class="col-sm-12">
      <h5>
	(000)中央銀行(鋒兄分行)存款金額：∞
      </h5> 
      <p>
	<button type="button" class="btn btn-primary" data-bs-toggle="tooltip" onclick="Button_Click1()">修改</button>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" id="button2" class="btn btn-primary" data-bs-toggle="tooltip">彩蛋</button>  
     </p>
	<img src="cat20240917_183326-removebg.png" alt="喵布布" width="231" height="173"> 
    </div>
  </div>
</div>
<br>
<?php include 'readFile.php';
?>
</body>
</html>
