# CRUD ด้วย PHP และ MySQL

ตัวอย่างนี้เป็นตัวอย่างของการสร้างระบบ CRUD (Create Read Update Delete) 
ด้วยการใช้ PHP MySQL และ Bootstrap เพื่อให้ UI ดูสวยงาม

## โครงสร้างของโปรเจค

/crud_app
|-- /css
|   |-- styles.css
|-- /js
|   |-- scripts.js
|-- /includes
|   |-- db.php
|-- index.php
|-- create.php
|-- read.php
|-- update.php
|-- delete.php

## วิธีการติดตั้ง (ใช้ xampp )
1. ดาวน์โหลดและติดตั้ง [XAMPP](https://www.apachefriends.org/index.html)
2. คลิกที่ปุ่ม “Start” ที่อยู่ข้าง ๆ Apache และ MySQL บน XAMPP Control Panel
3. นำตัวอย่างนี้นี้ไปที่โฟลเดอร์ `htdocs` ของ XAMPP หรือสร้างใหม่ก็ได้เอาตามที่ถนัด (ตัวอย่าง ของไฟล์จะอยู่ที่ `C:\xampp\htdocs`)

## การตั้งค่าฐานข้อมูล

1. เปิดเบราว์เซอร์และเข้าไปที่ `http://localhost/phpmyadmin`
2. สร้างฐานข้อมูลใหม่ชื่อ `myDatabase` หรือจั้งชื่อตามใจได้
3. ใช้ SQL ด้านล่างนี้ในการสร้างตาราง หรือทำการสร้าง ตารางที่ตัวของ phpmyadmin ได้เลย

## ตัวอย่างต่อไปนี้ทำหน้าที่อะไรบ้าง 

1. หน้าแสดงข้อมูล (index.php)
หน้าหลักที่ใช้ในการแสดงข้อมูลจากตาราง MyGuests พร้อมกับตัวเลือกในการเพิ่ม, แก้ไข และลบข้อมูล

2. หน้าเพิ่มข้อมูล (create.php)
หน้าที่ใช้ในการเพิ่มข้อมูลใหม่ลงในตาราง MyGuests

3. หน้าแก้ไขข้อมูล (update.php)
หน้าที่ใช้ในการแก้ไขข้อมูลที่มีอยู่ในตาราง MyGuests

4. หน้าลบข้อมูล (delete.php)
หน้าที่ใช้ในการลบข้อมูลออกจากตาราง MyGuests
