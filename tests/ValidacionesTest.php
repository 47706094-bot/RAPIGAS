<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../api/validardni.php';
class ValidacionesTest extends TestCase {
    public function testDniValido() {
        $this->assertTrue(validarDni('12345678'));
    }

    public function testDniInvalidoPorLongitud() {
        $this->assertFalse(validarDni('1234'));
    }

    public function testDniInvalidoPorCaracteres() {
        $this->assertFalse(validarDni('12A4567B'));
    }
}