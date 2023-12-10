<?php
$host = "db"; // โฮสต์ของฐานข้อมูล
$dbname = "esr"; // ชื่อฐานข้อมูล
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = "root"; // รหัสผ่านฐานข้อมูล

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "เชื่อมต่อกับฐานข้อมูลสำเร็จ";
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาดในการเชื่อมต่อกับฐานข้อมูล: " . $e->getMessage();
}
?>
