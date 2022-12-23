<?php
$nama = $_POST["nama"] ?? "";
echo json_encode(["nama" => $nama]);
