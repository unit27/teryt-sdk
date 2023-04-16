<?php

namespace Goosfraba\Teryt;

interface TerytApi
{
    /**
     * Checks the date of TERC catalogue
     *
     * @return \DateTimeInterface
     */
    public function PobierzDateAktualnegoKatTerc(): \DateTimeInterface;

    /**
     * Checks the date of NTS catalogue
     *
     * @return \DateTimeInterface
     */
    public function PobierzDateAktualnegoKatNTS():  \DateTimeInterface;

    /**
     * Checks the date of SIMC catalogue
     *
     * @return \DateTimeInterface
     */
    public function PobierzDateAktualnegoKatSimc(): \DateTimeInterface;

    /**
     * Checks the date of ULIC catalogue
     *
     * @return \DateTimeInterface
     */
    public function PobierzDateAktualnegoKatUlic(): \DateTimeInterface;

    /**
     * List the voivodeships
     *
     * @param \DateTimeInterface|null $stateAt
     * @return TercUnit[]
     */
    public function PobierzListeWojewodztw(\DateTimeInterface $stateAt = null): array;

    /**
     * Lists the counties of given voivodship
     *
     * @param string $voivodeship
     * @param \DateTimeInterface|null $stateAt
     * @return TercUnit[]
     */
    public function PobierzListePowiatow(string $voivodeship, \DateTimeInterface $stateAt = null): array;

    /**
     * Lists the communes of given county
     *
     * @param string $voivodeship
     * @param string $county
     * @param \DateTimeInterface|null $stateAt
     * @return TercUnit[]
     */
    public function PobierzListeGmin(string $voivodeship, string $county, \DateTimeInterface $stateAt = null): array;

    /**
     * Lists the counties and communes of given voivodeship
     */
    public function PobierzGminyiPowDlaWoj(string $voivodeship, \DateTimeInterface $stateAt = null): array;

    /**
     * Checks if user can be authenticated
     *
     * @return bool
     */
    public function CzyZalogowany(): bool;

    /**
     * Gets the list of TERYT unit types
     *
     * @return EnumItem[]
     */
    public function PobierzSlownikRodzajowJednostek(): array;

    /**
     * Gets the list of SIMC unit types
     *
     * @param \DateTimeInterface|null $stateAt
     * @return SIMCType[]
     */
    public function PobierzSlownikRodzajowSIMC(?\DateTimeInterface $stateAt = null): array;

    /**
     * Gets the list of ULIC unit types
     *
     * @return EnumItem[]
     */
    public function PobierzSlownikCechULIC(): array;

    /**
     * Gets the ZIP file of TERYT TERC catalogue
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogTERC(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT TERC catalogue in address version
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogTERCAdr(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT NTS catalogue
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogNTS(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT SIMC catalogue in address version
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogSIMCAdr(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT SIMC catalogue in address version
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogSIMC(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT SIMC Stat catalogue
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogSIMCStat(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT ULIC catalogue in
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogULIC(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT ULIC catalogue in address version
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogULICAdr(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT ULIC catalogue in "no borough" version
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogULICBezDzielnic(\DateTimeInterface $stateAt = null): CatalogFile;

    /**
     * Gets the ZIP file of TERYT WMRODZ catalogue
     *
     * @param \DateTimeInterface|null $stateAt
     * @return CatalogFile
     */
    public function PobierzKatalogWMRODZ(\DateTimeInterface $stateAt = null): CatalogFile;
}
