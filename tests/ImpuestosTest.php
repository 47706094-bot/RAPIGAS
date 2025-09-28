<?php
use PHPUnit\Framework\TestCase;


require_once __DIR__ . '/../api/impuestos.php';

class ImpuestosTest extends TestCase {
    public function testCalcularIgv() {
        // Espera que 100.0 genere 18.0
        $this->assertEquals(18.0, calcularIgv(100.0));
    }

    public function testCalcularIgvMontoCero() {
        $this->assertEquals(0.0, calcularIgv(0.0));
    }
}