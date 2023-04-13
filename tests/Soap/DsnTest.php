<?php

namespace Goosfraba\Teryt\Soap;

use PHPUnit\Framework\TestCase;

class DsnTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesTestDsn(): void
    {
        $this->assertFalse(Dsn::test()->isProd());
    }

    /**
     * @test
     */
    public function itCreatesProdDsn(): void
    {
        $dsn = Dsn::prod($user = "some-user", $pass = "some-pass");
        $this->assertTrue($dsn->isProd());
        $this->assertEquals($user, $dsn->user());
        $this->assertEquals($pass, $dsn->password());
    }

    /**
     * @test
     */
    public function itParsesProdDsn(): void
    {
        $dsn = Dsn::parse("gus+teryt://user:pass@prod");
        $this->assertTrue($dsn->isProd());
        $this->assertEquals("user", $dsn->user());
        $this->assertEquals("pass", $dsn->password());
    }

    /**
     * @test
     */
    public function itParsesNonProdDsn(): void
    {
        $dsn = Dsn::parse("gus+teryt://user:pass@not-prod");
        $this->assertFalse($dsn->isProd());
        $this->assertNotEquals("user", $dsn->user());
        $this->assertNotEquals("pass", $dsn->password());
    }

    /**
     * @test
     */
    public function itThrowsExceptionOnInvalidSchemeOnParse(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Dsn::parse("teryt://user:pass@not-prod");
    }
}
