<!DOCTYPE html>
<html lang="en">
<?php include('db_connect.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESR Table</title>
</head>

<style>
    #esr {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #esr td,
    #esr th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #esr tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #esr tr:hover {
        background-color: #ddd;
    }

    #esr th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>
    <h1>ESR Table</h1> <a href=""><h2>เปิดใบงาน</h2></a>

    <table id="esr">
        <tr>
            <th>ESR No.</th>
            <th>W/O</th>
            <th>นซย.</th>
            <th>แบบ</th>
            <th>อาการข้อขัดข้อง</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        $query = "SELECT * FROM tbl_esr";
        $result = $pdo->query($query);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <tr>
                    <td><?php echo $row["esr_no"]; ?></td>
                    <td><?php echo $row["work_order"]; ?></td>
                    <td><?php echo $row["unit_repair"]; ?></td>
                    <td><?php echo $row["type_system"]; ?></td>
                    <td><?php echo $row["error_system"]; ?></td>
                    <td><a href="view_page.php?id=<?php echo $row['id']; ?>" target="_blank">View</a></td>
                    <td><a href="edit_page.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='8'>No data found.</td></tr>";
        }
        ?>
    </table>
</body>

</html>
