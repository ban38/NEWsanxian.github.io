<?php
// 檢查表單是否已提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 取得表單資料
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // 設定您的電子郵件
    $to = "a0973369873@gmail.com"; // 替換為您的電子郵件地址
    $subject = "來自網站的留言板消息";

    // 組合郵件內容
    $body = "姓名: $name\n";
    $body .= "電子郵件: $email\n";
    $body .= "留言內容:\n$message\n";

    // 設定郵件標頭
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // 發送郵件
    if (mail($to, $subject, $body, $headers)) {
        // 發送成功後的回應
        echo "<script>alert('您的留言已成功提交！感謝您的來信。');window.location.href='guestbook.html';</script>";
    } else {
        // 發送失敗時的回應
        echo "<script>alert('抱歉，留言發送失敗，請稍後再試。');window.location.href='guestbook.html';</script>";
    }
} else {
    // 如果直接訪問此頁面，跳轉回留言板
    header("Location: guestbook.html");
    exit();
}
?>
