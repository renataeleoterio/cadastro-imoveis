<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseTest extends TestCase
{
    public function test_database_connection()
    {
        try {
            $pdo = DB::connection()->getPdo();
            $this->assertTrue($pdo instanceof \PDO);
            echo "\n✅ Conectado ao banco: " . DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            $this->fail("❌ Falha na conexão: " . $e->getMessage());
        }
    }

    public function test_basic_queries()
    {
        // teste seguro (apenas leitura)
        $count = DB::table('pessoas')->count();
        $this->assertIsInt($count);
        echo "\n✅ Contagem de pessoas: " . $count;



        }

}
