<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../api/usuarios_functions.php';

class UsuariosTest extends TestCase {
    protected $pdo;

    protected function setUp(): void {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec("
            CREATE TABLE usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT, apellido TEXT, dni TEXT,
                direccion TEXT, telefono TEXT, cargo TEXT,
                responsabilidad TEXT, usuario TEXT
            )
        ");
    }

    public function testInsertarUsuarioCreaNuevoRegistro() {
        $data = [
            'nombre'=>'Juan', 'apellido'=>'Pérez','dni'=>'123',
            'direccion'=>'Av X', 'telefono'=>'555',
            'cargo'=>'Operario', 'responsabilidad'=>'Reparto',
            'usuario'=>'jperez'
        ];

        insertarUsuario($this->pdo, $data); // función aún no existe

        $usuarios = obtenerUsuarios($this->pdo);
        $this->assertCount(1, $usuarios);
        $this->assertEquals('Juan', $usuarios[0]['nombre']);
    }
}
