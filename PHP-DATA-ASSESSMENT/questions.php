<?php
$questions = [
    [
        'question' => 'จงเขียน PHP โปรแกรมที่แสดงคำว่า "Hello, World!"',
        'answer' => 'Hello, World!',
        'code' => '<?php echo "Hello, World!"; ?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมที่บวกเลข 5 กับ 3 และแสดงผลลัพธ์',
        'answer' => '8',
        'code' => '<?php echo 5 + 3; ?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมที่แสดงคำว่า "PHP is fun!"',
        'answer' => 'PHP is fun!',
        'code' => '<?php echo "PHP is fun!"; ?>'
    ],
];

echo json_encode($questions);
?>
