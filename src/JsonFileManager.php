<?php

use Exception;

class JsonFileManager implements FileManager {

    public function readFile($filename): ?string {
        try {
            return file_get_contents($filename);
        } catch (Exception $e) {
            echo "Ошибка чтения файла: " . $e->getMessage();
            return null;
        }
    }

    public function writeFile($filename, $data): bool {
        try {
            return file_put_contents($filename, json_encode($data)) !== false;
        } catch (Exception $e) {
            echo "Ошибка записи файла: " . $e->getMessage();
            return false;
        }
    }
}