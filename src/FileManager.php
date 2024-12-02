<?php

interface FileManager {
    public function readFile($filename): ?string;
    public function writeFile($filename, $data): bool;
}