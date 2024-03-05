<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Barang;

class BarangTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_normalize_nama_barang(): void 
    {
    //    Cara 1
        // $this->assertTrue(Barang::normalizeNamaBarang('nama barang') == 'Nama Barang');
    //    Cara 2
        

        // $this->assertEquals(
        //     $expected = 'Nama Barang',
        //     $actual = Barang::normalizeNamaBarang('nama barang'),
        //     $message = 'Belum Proper Case'
        // );

        // $this->assertNotEquals(
        //     'Nama Barang', 
        //     Barang::normalizeNamaBarang('nama_barang')
        // );

        // $this->assertEquals(
        //     'Nama_barang', 
        //     Barang::normalizeNamaBarang('nama_barang')
        // );

        // Cara 3: For each

        $testCases = [
            'semua lower case' => ['expected' => 'Nama Barang', 'input' => 'nama barang'],
            'nama barang underscore' => ['expected' => 'Nama_barang', 'input' => 'nama_barang']
        ];
        foreach ($testCases as $title => $test) {
            $this->assertEquals(
                $expected = $test['expected'],
                $actual = Barang::normalizeNamaBarang($test['input']),
                $message = 'Belum Proper Case'
            );
        }

    }
}
