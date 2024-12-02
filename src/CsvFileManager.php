<?php

use Exception;

class CsvFileManager implements FileManager {

    public function readFile($filename): ?string {
        try {
            $data = [];
            if (($handle = fopen($filename, "r")) !== FALSE) {
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $data[] = $row;
                }
                fclose($handle);
            }
            return json_encode($data); // Преобразование в JSON для более удобной обработки
        } catch (Exception $e) {
            echo "Ошибка чтения файла: " . $e->getMessage();
            return null;
        }
    }

    public function writeFile($filename, $data): bool {
        try {
            $fp = fopen($filename, 'w');
            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            return true;
        } catch (Exception $e) {
            echo "Ошибка записи файла: " . $e->getMessage();
            return false;
        }
    }
}