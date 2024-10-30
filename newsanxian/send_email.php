<?php
// 確認表單已提交並且包含所有必填欄位
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    
    // 設定收件人的電子郵件地址（更改為你的電子郵件）
    $to = "a0973369873@gmail.com"; // 請更改為你的電子郵件
    $subject = "新的留言來自: $name";
    $body = "姓名: $name\n";
    $body .= "電子郵件: $email\n";
    $body .= "留言內容:\n$message";
    
    // 設定電子郵件的標頭
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // 使用 mail() 函數發送電子郵件
    if (mail($to, $subject, $body, $headers)) {
        echo "留言已成功寄送！";
    } else {
        echo "抱歉，無法寄送留言。請稍後再試。";
    }
}
?>
