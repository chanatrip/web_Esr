<?php
// if (isset($_POST['input_text'])) {
//     $name = $_POST['input_text'];
//     echo "<p>Received input_text: $inputText</p>";
// } else {
//     echo "<p>No data received</p>";
// }
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI'=> 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun',
    'format' => 'A4',
]);

$test = "COM";
$pagecount = $mpdf->setSourceFile('./pdf/temp.pdf');
$tplId = $mpdf->importPage($pagecount);
$mpdf->useTemplate($tplId);

$html = '   <h1  style="position: absolute;top: 86px; left: 68px; font-size: 18px; color: red;">'.$test.'</h1>
            <h1  style="position: absolute;top: 86px; left: 200px; font-size: 18px; color: red;">ACCS1</h1>
            <h1  style="position: absolute;top: 86px; left: 430px; font-size: 18px; color: red;">ALL-</h1>
            <h1  style="position: absolute;top: 86px; left: 605px; font-size: 18px; color: red;"><span style="color: red;">177</span><span style="color: white;">-</span></h1>
            <h1  style="position: absolute;top: 86px; left: 710px; font-size: 18px; color: red;">3/10</h1>


            <h1  style="position: absolute;top: 140px; left: 45px; font-size: 18px; color: red;">'.$test.'</h1>
            <h1  style="position: absolute;top: 140px; left: 225px; font-size: 18px; color: red;">20.ต.ค.66 / 0900</h1>
            <h1  style="position: absolute;top: 140px; left: 520px; font-size: 18px; color: red;">100hr</h1>
            <h1  style="position: absolute;top: 140px; left: 695px; font-size: 18px; color: red;">2M--</h1>


            <h1  style="position: absolute;top: 193px; left: 45px; font-size: 18px; color: red;">Digital Recorder Unit (DRU1) S/N 740000262</h1>
            <h1  style="position: absolute;top: 213px; left: 45px; font-size: 18px; color: red;">Record ไม่ได้</h1>

            <h1  style="position: absolute;top: 193px; left: 500px; font-size: 18px; color: red;">10/10/10</h1>
            <h1  style="position: absolute;top: 193px; left: 615px; font-size: 18px; color: red;">0900</h1>
            <h1  style="position: absolute;top: 193px; left: 740px; font-size: 18px; color: red;">ใคร-</h1>

            <h1  style="position: absolute;top: 595px; left: 70px; font-size: 18px; color: red;">COM</h1>
            <h1  style="position: absolute;top: 570px; left: 222px; font-size: 18px; color: red;">ACCS</h1>
            <h1  style="position: absolute;top: 570px; left: 480px; font-size: 18px; color: red;">ALL-</h1>
            <h1  style="position: absolute;top: 570px; left: 650px; font-size: 18px; color: red;">หมายเลขใบงาน</h1>


            <h1  style="position: absolute;top: 643px; left: 60px; font-size: 18px; color: red;">ESR.No</h1>
            <h1  style="position: absolute;top: 643px; left: 150px; font-size: 18px; color: red;">20.ต.ค.66</h1>
            <h1  style="position: absolute;top: 643px; left: 300px; font-size: 18px; color: red;">20.ต.ค.66</h1>
            <h1  style="position: absolute;top: 643px; left: 440px; font-size: 18px; color: red;">10---</h1>
            <h1  style="position: absolute;top: 620px; left: 540px; font-size: 18px; color: red;">ค่าแรง</h1>
            <h1  style="position: absolute;top: 645px; left: 540px; font-size: 18px; color: red;">10---</h1>


            <h1  style="position: absolute;top: 690px; left: 45px; font-size: 18px; color: red;">Digital Recorder Unit (DRU1) S/N 740000262</h1>
            <h1  style="position: absolute;top: 710px; left: 45px; font-size: 18px; color: red;">Record ไม่ได้</h1>

            <h1  style="position: absolute;top: 670px; left: 550px; font-size: 18px; color: red;">AWM</h1>
            <h1  style="position: absolute;top: 670px; left: 655px; font-size: 18px; color: red;">20.ต.ค.66</h1>



            <h1  style="position: absolute;top: 765px; left: 45px; font-size: 18px; color: red;">การแก้ไข / การดำเนินงาน</h1>

            <h1  style="position: absolute;top: 747px; left: 550px; font-size: 18px; color: red;">AWM</h1>
            <h1  style="position: absolute;top: 747px; left: 655px; font-size: 18px; color: red;">20.ต.ค.66</h1>

';


$mpdf->WriteHTML($html);
$mpdf->Output();
// $mpdf->OutputFile(__DIR__ . '/pdf/file.pdf');

?>
