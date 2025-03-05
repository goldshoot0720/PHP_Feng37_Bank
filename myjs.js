localStorage.clear();
let bank_savings = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
function Calc_Sum_Saving()
{
    let sum_saving = 0;
    for (let i = 0; i < 10; i++)
    {
        sum_saving += parseInt(bank_savings[i]);
    }
    return sum_saving;
}
function Button_Click1() {
	let index = document.getElementById("financial_institution").selectedIndex;
	let value = document.getElementById("saving").value;
	if (value.toString().indexOf('.') > -1){
		alert("請輸入整數數字");
		return;
	}
	let num = parseInt(value);
	if (isNaN(num)){
		alert("請輸入整數數字");
		return;
	}
let saving = document.getElementById("saving").value;
bank_savings[index] = saving;
document.getElementById("sum_saving").innerHTML = Calc_Sum_Saving();
My_LocalStorage();

// 轉換 localStorage 為關聯陣列
let temp_bank_savings = {};
for (let i = 0; i < 10; i++) {
    temp_bank_savings[i.toString()] = localStorage.getItem(i.toString()) || "0";
}

// 確認傳送內容
console.log("傳送 JSON:", JSON.stringify(temp_bank_savings));

fetch("process.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(temp_bank_savings)
})
.then(response => response.text())
.then(data => console.log("PHP 回應:", data))
.catch(error => console.error("錯誤:", error));
}
function Select_Onchange() {
	let index = document.getElementById("financial_institution").selectedIndex;
	document.getElementById("saving").value = bank_savings[index];
}
window.addEventListener("load", (event) => {
  	let index = document.getElementById("financial_institution").selectedIndex;
 	document.getElementById("saving").value = bank_savings[index];
	document.getElementById("sum_saving").innerHTML = Calc_Sum_Saving();
});
function My_LocalStorage(){
	for (let i = 0; i < 10; i++)
    	{
        	localStorage.setItem(i.toString(), bank_savings[i]);
    	}
}
document.addEventListener("DOMContentLoaded", function() {
    let button2 = document.getElementById("button2");
    if (button2) {
        button2.addEventListener("click", Button_Click2);
    }
});

function Button_Click2() {
    alert("委任第五職等\n簡任第十二職等\n第12屆臺北市長\n第23任總統\n中央銀行鋒兄分行");
}

