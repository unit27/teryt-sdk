<?php

namespace Goosfraba\Teryt\Soap;

use Goosfraba\Teryt\CatalogFile;
use Goosfraba\Teryt\TerytApi;
use Webit\SoapApi\Executor\SoapApiExecutor;

final class TerytSoapApi implements TerytApi
{
    private SoapApiExecutor $executor;

    public function __construct(
        SoapApiExecutor $executor
    ) {
        $this->executor = $executor;
    }

    /**
     * @inheritDoc
     */
    public function CzyZalogowany(): bool
    {
        $result = $this->executor->executeSoapFunction(TerytSoapFunctions::CZY_ZALOGOWANY);

        return $result->CzyZalogowanyResult ?? false;
    }

    public function WyszukajMiejscowosc(string $name): array
    {
        return $this->executor->executeSoapFunction(TerytSoapFunctions::WYSZUKAJ_MIEJSCOWOSC, [
            [
                "nazwaMiejscowosci" => $name
            ]
        ]);
    }

    public function WyszukajUlice(string $city, string $name): array
    {
        return $this->executor->executeSoapFunction(TerytSoapFunctions::WYSZUKAJ_ULICE, [
            [
                "nazwamiejscowosci" => $city,
                "nazwaulicy" => $name
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    public function PobierzSlownikRodzajowJednostek(): array
    {
        return $this->executor->executeSoapFunction(TerytSoapFunctions::POBIERZ_SLOWNIK_RODZAJOW_JEDNOSTEK);
    }

    /**
     * @inheritDoc
     */
    public function PobierzSlownikRodzajowSIMC(?\DateTimeInterface $stateAt = null): array
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_SLOWNIK_RODZAJOW_SIMC,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzSlownikCechULIC(): array
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_SLOWNIK_CECH_ULIC
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogTERC(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_TERC,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogTERCAdr(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_TERC_ADR,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogNTS(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_NTS,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogSIMCAdr(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC_ADR,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogSIMC(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogSIMCStat(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC_STAT,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogULIC(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogULICAdr(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC_ADR,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogULICBezDzielnic(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC_BEZ_DZIELNIC,
            $this->dateArgument($stateAt)
        );
    }

    /**
     * @inheritDoc
     */
    public function PobierzKatalogWMRODZ(\DateTimeInterface $stateAt = null): CatalogFile
    {
        return $this->executor->executeSoapFunction(
            TerytSoapFunctions::POBIERZ_KATALOG_WMRODZ,
            $this->dateArgument($stateAt)
        );
    }

    private function dateArgument(?\DateTimeInterface $stateAt): array
    {
        return [
            [
                'DataStanu' => ($stateAt ?? date_create_immutable())->format('Y-m-d')
            ]
        ];
    }
}
