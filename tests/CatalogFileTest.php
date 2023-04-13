<?php

namespace Goosfraba\Teryt;

use PHPUnit\Framework\TestCase;

class CatalogFileTest extends TestCase
{
    /** @var \SplFileObject[] */
    private array $files;

    /**
     * @test
     */
    public function itDumpsFileIntoTempDir(): void
    {
        $catalogFile = new CatalogFile(
            "some-name" . mt_rand(0, 10000),
            base64_encode($content = "some-content" . mt_rand(0, PHP_INT_MAX))
        );

        $this->files[] = $file = $catalogFile->dump();
        $this->assertEquals($content, file_get_contents($file->getPathname()));
    }

    /**
     * @test
     */
    public function itDumpsFileIntoGivenPathname(): void
    {
        $catalogFile = new CatalogFile(
            "some-name" . mt_rand(0, 10000),
            base64_encode($content = "some-content" . mt_rand(0, PHP_INT_MAX))
        );

        $pathName = tempnam(sys_get_temp_dir(), 'my-prefix_').".zip";

        $this->files[] = $file = $catalogFile->dump($pathName);
        $this->assertEquals($pathName, $file->getPathname());
        $this->assertEquals($content, file_get_contents($file->getPathname()));
    }

    protected function tearDown(): void
    {
        foreach ($this->files as $file) {
            @unlink($file->getPathname());
        }
    }
}
