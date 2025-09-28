<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../api/search_functions.php';

class SearchTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        // Creamos una BD SQLite en memoria para pruebas
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Creamos tabla usuarios con datos ficticios
        $this->pdo->exec("
            CREATE TABLE usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT,
                apellido TEXT,
                dni TEXT
            )
        ");
        $this->pdo->prepare("INSERT INTO usuarios (nombre, apellido, dni) VALUES (?,?,?)")
                  ->execute(['Juan','Pérez','12345678']);
        $this->pdo->prepare("INSERT INTO usuarios (nombre, apellido, dni) VALUES (?,?,?)")
                  ->execute(['Maria','Gómez','87654321']);
    }

    public function testBuscarUsuariosDevuelveResultados()
    {
        $resultado = buscarUsuarios('Juan', $this->pdo);

        $this->assertIsArray($resultado);
        $this->assertCount(1, $resultado);
        $this->assertEquals('Juan', $resultado[0]['nombre']);
    }

    public function testBuscarUsuariosSinCoincidencias()
    {
        $resultado = buscarUsuarios('Xyz', $this->pdo);

        $this->assertIsArray($resultado);
        $this->assertCount(0, $resultado);
    }
}
