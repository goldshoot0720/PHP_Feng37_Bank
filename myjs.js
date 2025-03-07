// localStorage.clear();
let bank_savings = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
function Calc_Sum_Saving() {
    let sum_saving = 0;
    for (let i = 0; i < 10; i++) {
        sum_saving += parseInt(bank_savings[i]);
    }
    return sum_saving;
}
function Button_Click1() {
    let index = document.getElementById("financial_institution").selectedIndex;
    let value = document.getElementById("saving").value;
    if (value.toString().indexOf(".") > -1) {
        alert("請輸入整數數字");
        return;
    }
    let num = parseInt(value);
    if (isNaN(num)) {
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
        temp_bank_savings[i.toString()] =
            localStorage.getItem(i.toString()) || "0";
    }

    // 確認傳送內容
    console.log("傳送 JSON:", JSON.stringify(temp_bank_savings));

    fetch("process.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(temp_bank_savings),
    })
        .then((response) => response.text())
        .then((data) => console.log("PHP 回應:", data))
        .catch((error) => console.error("錯誤:", error));
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
function My_LocalStorage() {
    for (let i = 0; i < 10; i++) {
        localStorage.setItem(i.toString(), bank_savings[i]);
    }
}
document.addEventListener("DOMContentLoaded", function () {
    let button2 = document.getElementById("button2");
    if (button2) {
        button2.addEventListener("click", Button_Click2);
    }
});

function Button_Click2() {
    let sumSaving = Calc_Sum_Saving();
    let howIRich = "鋒兄";
    if (sumSaving >= 100000000) {
        howIRich = "億萬豪宅";
    } else if (sumSaving >= 10000000) {
        howIRich = "仟萬超跑";
    } else if (sumSaving >= 1000000) {
        howIRich = "佰萬第一桶金";
    } else if (sumSaving >= 100000) {
        howIRich = "十萬個為什麼";
    } else if (sumSaving >= 10000) {
        howIRich = "日本有萬元鈔";
    } else if (sumSaving >= 1000) {
        howIRich = "千元鈔票";
    } else if (sumSaving >= 100) {
        howIRich = "百元鈔票";
    } else if (sumSaving >= 50) {
        howIRich = "五十元銅板價";
    } else if (sumSaving >= 10) {
        howIRich = "十元硬幣";
    } else if (sumSaving >= 5) {
        howIRich = "五元硬幣";
    } else if (sumSaving >= 1) {
        howIRich = "壹元硬幣";
    } else if (sumSaving == 0) {
        howIRich = "從零開始";
    } else if (sumSaving < 0) {
        howIRich = "不要負債";
    }
	/*
    alert(
        howIRich +
            "\n㊣\n委任第五職等\n簡任第十二職等\n第12屆臺北市長\n第23任總統\n中央銀行鋒兄分行"
    );
	*/
	Swal.fire({
  title: "㊣"+howIRich+"㊣",
  html: "委任第五職等<br>簡任第十二職等<br>第12屆臺北市長<br>第23任總統<br>中央銀行鋒兄分行",
  icon: "success",
  imageUrl: "cat20240917_183326-removebg.png",
  imageWeight: 231,
  imageHeight: 173,
  imageAlt: "A cat named Miabubu."
	});

}
