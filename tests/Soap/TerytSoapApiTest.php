<?php

namespace Goosfraba\Teryt\Soap;

use Goosfraba\Teryt\EnumItem;
use Goosfraba\Teryt\SIMCType;
use PHPUnit\Framework\TestCase;

class TerytSoapApiTest extends TestCase
{
    private TerytSoapApi $api;

    protected function setUp(): void
    {
        $factory = new TerytApiFactory();
        $this->api = $factory->create($this->dsn());
    }

    public function testCzyZalogowany(): void
    {
        $this->assertTrue($this->api->CzyZalogowany());
    }

    public function testPobierzKatalogTERC(): void
    {
        $plik = $this->api->PobierzKatalogTERC();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogTERCAddr(): void
    {
        $plik = $this->api->PobierzKatalogTERCAdr();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogNTS(): void
    {
        $plik = $this->api->PobierzKatalogNTS();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogSIMC(): void
    {
        $plik = $this->api->PobierzKatalogSIMC();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogSIMCAdr(): void
    {
        $plik = $this->api->PobierzKatalogSIMCAdr();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogSIMCStat(): void
    {
        $plik = $this->api->PobierzKatalogSIMCStat();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogULIC(): void
    {
        $plik = $this->api->PobierzKatalogULIC();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogULICAdr(): void
    {
        $plik = $this->api->PobierzKatalogULICAdr();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogULICBezDzielnic(): void
    {
        $plik = $this->api->PobierzKatalogULICBezDzielnic();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzKatalogWMRODZ(): void
    {
        $plik = $this->api->PobierzKatalogWMRODZ();
        $this->assertNotEmpty($plik->name());
        $this->assertNotEmpty($plik->content());
    }

    public function testPobierzSlownikRodzajowJednostek(): void
    {
        $this->assertContainsOnlyInstancesOf(
            EnumItem::class,
            $this->api->PobierzSlownikRodzajowJednostek()
        );
    }

    public function testPobierzSlownikRodzajowSIMC(): void
    {
        $this->assertContainsOnlyInstancesOf(
            SIMCType::class,
            $this->api->PobierzSlownikRodzajowSIMC()
        );
    }

    public function testPobierzSlownikCechULIC(): void
    {
        $this->assertContainsOnlyInstancesOf(
            EnumItem::class,
            $this->api->PobierzSlownikCechULIC()
        );
    }

    public function testPobierzDateAktualnegoKatTerc(): void
    {
        $date = $this->api->PobierzDateAktualnegoKatTerc();
        $this->assertNotEmpty($date);
    }

    public function testPobierzDateAktualnegoKatNTS(): void
    {
        $date = $this->api->PobierzDateAktualnegoKatNTS();
        $this->assertNotEmpty($date);
    }

    public function testPobierzDateAktualnegoKatSIMC(): void
    {
        $date = $this->api->PobierzDateAktualnegoKatSimc();
        $this->assertNotEmpty($date);
    }

    public function testPobierzDateAktualnegoKatULIC(): void
    {
        $date = $this->api->PobierzDateAktualnegoKatUlic();
        $this->assertNotEmpty($date);
    }

    private function dsn(): Dsn
    {
        $dsn = getenv("GUS_TERYT_DSN");
        if ($dsn) {
            return Dsn::parse($dsn);
        }

        return Dsn::test();
    }
}
