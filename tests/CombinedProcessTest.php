<?php

namespace PigeonTest\Tests;

use PHPUnit\Framework\TestCase;

require_once 'CombinedProcess.php';

class CombinedProcessTest extends TestCase
{
    public function testProcessFileSuccessfully()
    {
        $_FILES['upload-xml']['name'] = "Generated_52.xml"; // Задайте ім'я файлу, яке ви хочете перевірити

        ob_start(); // Перехоплюємо вивід, щоб перевірити повідомлення
        include 'CombinedProcess.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('File processed successfully', $output);
    }
}
