<?php
    // กำหนดค่าให้กับตัวแปร $getValue โดยใช้ ternary operator
    $getValue = isset($_GET['test']) && $_GET['test'] !== "" ? $_GET['test'] : 'None';

    // แสดงผลค่า $getValue
    echo $getValue;
?>