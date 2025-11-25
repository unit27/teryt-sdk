<?php declare(strict_types=1);

namespace Goosfraba\Teryt\Soap;

final class TerytSoapFunctions
{
    public const string CZY_ZALOGOWANY = "CzyZalogowany";
    public const string POBIERZ_KATALOG_TERC = "PobierzKatalogTERC";
    public const string POBIERZ_KATALOG_TERC_ADR = "PobierzKatalogTERCAdr";
    public const string POBIERZ_KATALOG_NTS = "PobierzKatalogNTS";
    public const string POBIERZ_KATALOG_SIMC_ADR = "PobierzKatalogSIMCAdr";
    public const string POBIERZ_KATALOG_SIMC = "PobierzKatalogSIMC";
    public const string POBIERZ_KATALOG_SIMC_STAT = "PobierzKatalogSIMCStat";
    public const string POBIERZ_KATALOG_ULIC = "PobierzKatalogULIC";
    public const string POBIERZ_KATALOG_ULIC_ADR = "PobierzKatalogULICAdr";
    public const string POBIERZ_KATALOG_ULIC_BEZ_DZIELNIC = "PobierzKatalogULICBezDzielnic";
    public const string POBIERZ_KATALOG_WMRODZ = "PobierzKatalogWMRODZ";
    public const string POBIERZ_SLOWNIK_RODZAJOW_JEDNOSTEK = "PobierzSlownikRodzajowJednostek";
    public const string POBIERZ_SLOWNIK_CECH_ULIC = "PobierzSlownikCechULIC";
    public const string POBIERZ_SLOWNIK_RODZAJOW_SIMC = "PobierzSlownikRodzajowSIMC";
    public const string WYSZUKAJ_MIEJSCOWOSC = "WyszukajMiejscowosc";
    public const string WYSZUKAJ_ULICE = "WyszukajUlice";

    private function __construct()
    {
    }
}
