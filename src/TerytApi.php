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
