<!DOCTYPE html>
<html lang="en">
<?php include('db_connect.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
</head>

<body>
    <?php
    // Check if ID is set in the URL
    if (isset($_GET['id'])) {
        // Get the ID from the URL
        $id = $_GET['id'];

        // Query to retrieve data from tbl_esr based on ID
        $query = "SELECT * FROM tbl_esr WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the data
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if data is found
        if ($stmt->rowCount() > 0) {
    ?>
            <h1>View Page</h1>
            ESR No. :<?php echo $row["esr_no"]; ?> <br>
            W/O. :<?php echo $row["work_order"]; ?> <br>
            นซย :<?php echo $row["unit_repair"]; ?> <br>
            แบบ :<?php echo $row["type_system"]; ?> <br>
            หมายเลข :<?php echo $row["serial_number"]; ?> <br>
            อาการข้อขัดข้อง :<?php echo $row["error_system"]; ?> <br>
            ว.ด.ป.รายงาน(เปิด) :<?php echo $row["date_open"]; ?> <br>
            ว.ด.ป.รายงาน(ปิด) :<?php echo $row["date_close"]; ?> <br>
            การดำเนินการแก้ไข :<?php echo $row["corrective_action"]; ?> <br>
            รหัส :<?php echo $row["code_system"]; ?> <br>
            ที่อยู่ปัจจุบัน :<?php echo $row["address_system"]; ?> <br>

            เบอร์ติดต่อ :<?php echo $row["num_phone"]; ?> <br>
            ผจง(ผู้รับ) :<?php echo $row["sender"]; ?> <br>
            นซย(ผู้ส่ง) :<?php echo $row["receiver"]; ?> <br>
            owner site :<?php echo $row["owner_system"]; ?> <br>
            วันที่ลงเวลา :<?php echo $row["entry_date"]; ?> <br>
    <?php
        } else {
            echo "<p>No data found for the specified ID.</p>";
        }
    } else {
        echo "<p>ID parameter is missing in the URL.</p>";
    }
    ?>

    <h1> Time line </h1>
    <?php
        echo $id;
    // SELECT * FROM tbl_timeline WHERE number_id_esr = 1
        $query_timeline  = "SELECT * FROM tbl_timeline WHERE number_id_esr = :number_id_esr";
        $stmt_timeline   = $pdo->prepare($query_timeline);
        $stmt_timeline ->bindParam(':number_id_esr', $id, PDO::PARAM_INT); 
        $stmt_timeline ->execute();

        while ($row_timeline = $stmt_timeline->fetch(PDO::FETCH_ASSOC)) {
    ?>
            วันที่ :<?php echo $row_timeline["date_action"]; ?> <br>
            การดำเนินการแก้ไข :<?php echo $row_timeline["corrective_action"]; ?> <br>
            รหัส :<?php echo $row_timeline["code_system"]; ?> <br>
            ที่อยู่ปัจจุบัน :<?php echo $row_timeline["address_system"]; ?> <br>
            เบอร์ติดต่อ :<?php echo $row_timeline["num_phone"]; ?> <br>
            วันที่ลงเวลา :<?php echo $row_timeline["entry_date"]; ?> <br>
            ----------------------------------------------------------------------------<br>
    <?php
        }
    ?>
</body>

</html>
