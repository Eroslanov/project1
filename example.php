<?php

// Подключаем файл 
require_once '../src/FileManagerFactory.php';

// Пример 

$fileType = 'json'; 
$filename = 'files/JsonFile.json'; 

$fileManager = FileManagerFactory::createFileManager($fileType);

// Чтение 
$data = $fileManager->readFile($filename);
if ($data !== null) {
    echo "Содержимое файла: $data\n";
}

// Запись
$newData = ['key1' => 'value1', 'key2' => 'value2']; // Пример данных
$success = $fileManager->writeFile($filename, $newData);
if ($success) {
    echo "Файл записан успешно!\n";
}
