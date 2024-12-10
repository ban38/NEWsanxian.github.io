<?php
// 引入資料庫設定檔
include("config.php");

// 開啟錯誤報告
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 處理表單提交
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $messages = $_POST['message'];

    // 使用預備語句避免 SQL 注入
    $stmt = $con->prepare("INSERT INTO `users` (`username`, `email`, `messages`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $messages);

    if ($stmt->execute()) {
        // 成功後跳轉回首頁
        header("Location: ./guestbook.php");
        exit;
    } else {
        // 顯示錯誤訊息
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// 查詢留言資料
$sql1 = "SELECT * FROM `users`";
$result1 = mysqli_query($con, $sql1);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
    <link rel="shortcut icon" type="image/x-icon" href="qq.jpg" />
    <link rel="stylesheet" href="ppt.css">
</head>
<body>
    <header class="navbar">
        <h1>留言板</h1>
        <nav>
            <a href="index.html">首頁</a>
            <a href="article.html">文章</a>
            <a href="laboratory.html">實驗室</a>
            <a href="about.html">關於我</a>
            <a href="guestbook.php">留言板</a>
        </nav>
    </header>

    <main class="container">
        <!-- 留言表單區域 -->
        <section class="form-section">
            <h2>留下您的留言</h2>
            <form action="" method="POST">
                <label for="name">姓名：</label>
                <input type="text" id="name" name="username" required>
                
                <label for="email">電子郵件：</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">留言內容：</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit">提交留言</button>
            </form>
        </section>
        
        <!-- 留言顯示區域 -->
        <section class="comments-section">
            <h2>留言區</h2>
            <?php if ($result1 && mysqli_num_rows($result1) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result1)): ?>
                    <div class="comment">
                        <h3><?= htmlspecialchars($row['username']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($row['messages'])) ?></p>
                        <small>電子郵件：<?= htmlspecialchars($row['email']) ?></small>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>目前沒有留言。</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>
            <a href="https://github.com/ban38">MY GitHub</a> 
            <a href="https://www.instagram.com/11_Sanxian/?hl=zh-tw">Follow IG @11_Sanxian</a>
        </p>
        <p>&copy; 2024 Sanxian . 保留所有權利.</p>
    </footer>
</body>
</html>
