<?php
use PHPUnit\Framework\TestCase;

// todavía no existe este archivo ni función
require_once __DIR__ . '/../api/usuarios_utils.php';

class UsuariosUtilsTest extends TestCase {

    public function testGenerarNombreUsuarioBasico() {
        $this->assertEquals("jperez", generarNombreUsuario("Juan", "Perez"));
    }

    public function testGenerarNombreUsuarioMinusculas() {
        $this->assertEquals("mlopez", generarNombreUsuario("MARIA", "LOPEZ"));
    }

    public function testGenerarNombreUsuarioConEspacios() {
        $this->assertEquals("cgarcia", generarNombreUsuario(" Carlos ", "  Garcia "));
    }
}
