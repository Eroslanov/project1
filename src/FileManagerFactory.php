<?php

class FileManagerFactory {
    public static function createFileManager($fileType): FileManager {
        switch (strtolower($fileType)) {
            case 'txt':
                return new TxtFileManager();
            case 'json':
                return new JsonFileManager();
            case 'csv':
                return new CsvFileManager();
            default:
                throw new Exception("Неподдерживаемый тип файла: $fileType");
        }
    }
}