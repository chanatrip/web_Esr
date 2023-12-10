-- ตั้งค่า charset และ collation ของฐานข้อมูล esr
ALTER DATABASE esr CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- สร้างตาราง tbl_esr
CREATE TABLE `esr`.`tbl_esr` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    esr_no INT DEFAULT NULL,
    work_order VARCHAR(255) DEFAULT NULL,
    unit_repair VARCHAR(255) DEFAULT NULL,
    type_system VARCHAR(255) DEFAULT NULL,
    serial_number VARCHAR(255) DEFAULT NULL,
    error_system LONGTEXT DEFAULT NULL,
    date_open DATE DEFAULT NULL,
    date_close DATE DEFAULT NULL,
    date_action DATE DEFAULT NULL,
    corrective_action LONGTEXT DEFAULT NULL,
    code_system VARCHAR(255) DEFAULT NULL,
    address_system VARCHAR(255) DEFAULT NULL,
    num_phone VARCHAR(255) DEFAULT NULL,
    sender VARCHAR(255) DEFAULT NULL,
    receiver VARCHAR(255) DEFAULT NULL,
    owner_system VARCHAR(255) DEFAULT NULL,
    entry_date TIMESTAMP DEFAULT NULL
) ENGINE = InnoDB;

-- สร้างตาราง tbl_timeline
CREATE TABLE `esr`.`tbl_timeline` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number_id_esr VARCHAR(255) DEFAULT NULL,
    date_action DATE DEFAULT NULL,
    corrective_action LONGTEXT DEFAULT NULL,
    code_system VARCHAR(255) DEFAULT NULL,
    address_system VARCHAR(255) DEFAULT NULL,
    num_phone VARCHAR(255) DEFAULT NULL,
    entry_date TIMESTAMP DEFAULT NULL
) ENGINE=InnoDB;

-- เพิ่มข้อมูลลงในตาราง tbl_esr
INSERT INTO `tbl_esr` (`esr_no`, `work_order`, `unit_repair`, `type_system`, `serial_number`, `error_system`, `date_open`, `date_close`, `date_action`, `corrective_action`, `code_system`, `address_system`, `num_phone`, `sender`, `receiver`, `owner_system`, `entry_date`) 
VALUES ('123', '2/11', 'com', 'accs', 'All', 'หยุดปฏิบัติงานเนื่องจากไฟฟ้าขัดข้อง(2023-12-09)', '2023-12-09', '2023-12-10', '2023-12-10', 'mcc ดำเนินการตรวจสอบ(2023-12-09)', '2M', 'ผสอ', '2-5555', 'คนส่ง1', 'คนรับ 1', 'pnr', NOW());

-- เพิ่มข้อมูลลงในตาราง tbl_timeline
INSERT INTO `tbl_timeline` (`number_id_esr`, `date_action`, `corrective_action`, `code_system`, `address_system`, `num_phone`, `entry_date`) 
VALUES ('1', '2023-12-01', 'หยุดปฏิบัติงานเนื่องจากไฟฟ้าขัดข้อง1', '3m', 'บ้าน1', '22222', NOW()), ('1', '2023-12-02', 'หยุดปฏิบัติงานเนื่องจากไฟฟ้าขัดข้อง2', '34m', 'บ้าน 2', '3333', NOW());
