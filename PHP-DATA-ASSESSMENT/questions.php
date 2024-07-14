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
    [
        'question' => 'จงเขียน PHP โปรแกรมเพื่อเชื่อมต่อกับฐานข้อมูล MySQL',
        'answer' => 'เชื่อมต่อสำเร็จ',
        'code' => '<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "เชื่อมต่อสำเร็จ";
?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมเพื่อเพิ่มข้อมูลเข้าในตาราง users',
        'answer' => 'เพิ่มข้อมูลสำเร็จ',
        'code' => '<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL เพื่อเพิ่มข้อมูล
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES (\'John\', \'Doe\', \'john@example.com\')";

if ($conn->query($sql) === TRUE) {
    echo "เพิ่มข้อมูลสำเร็จ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมเพื่อแสดงข้อมูลทั้งหมดจากตาราง users',
        'answer' => 'แสดงข้อมูลสำเร็จ',
        'code' => '<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL เพื่อแสดงข้อมูล
$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงข้อมูลแต่ละแถว
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมเพื่ออัปเดตข้อมูลในตาราง users',
        'answer' => 'อัปเดตข้อมูลสำเร็จ',
        'code' => '<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL เพื่ออัปเดตข้อมูล
$sql = "UPDATE users SET lastname=\'Doe\' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "อัปเดตข้อมูลสำเร็จ";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>'
    ],
    [
        'question' => 'จงเขียน PHP โปรแกรมเพื่อลบข้อมูลจากตาราง users',
        'answer' => 'ลบข้อมูลสำเร็จ',
        'code' => '<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL เพื่อลบข้อมูล
$sql = "DELETE FROM users WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "ลบข้อมูลสำเร็จ";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>'
    ]
];

echo json_encode($questions);
?>
