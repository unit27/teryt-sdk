<?php

namespace Goosfraba\Teryt\Soap;

use Goosfraba\Teryt\Soap\Executor\ActionAddingExecutor;
use Goosfraba\Teryt\Soap\Hydrator\CatalogFileHydrator;
use Goosfraba\Teryt\Soap\Hydrator\DateHydrator;
use Goosfraba\Teryt\Soap\Hydrator\EnumItemHydrator;
use Goosfraba\Teryt\Soap\Hydrator\SIMCTypeHydrator;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;
use Webit\SoapApi\Hydrator\FrontHydrator;
use WsdlToPhp\WsSecurity\WsSecurity;

final class TerytApiFactory
{
    private const WSDL_PROD = "https://uslugaterytws1.stat.gov.pl/wsdl/terytws1.wsdl";
    private const WSDL_TEST = "https://uslugaterytws1test.stat.gov.pl/wsdl/terytws1.wsdl";

    /**
     * Creates an instance of TerytSoapApi for given DSN
     *
     * @param Dsn $dsn
     * @return TerytSoapApi
     */
    public function create(Dsn $dsn): TerytSoapApi
    {
        $builder = SoapApiExecutorBuilder::create();
        $builder->setExecutionHeaders([
            WsSecurity::createWsSecuritySoapHeader($dsn->user(), $dsn->password())
        ]);
        $builder->setSoapClient(
            new \SoapClient($dsn->isProd() ? self::WSDL_PROD : self::WSDL_TEST, ['trace' => true])
        );

        $builder->setHydrator(
            new FrontHydrator(
                array_merge(
                    $this->catalogFileHydrators(),
                    $this->enumObjectHydrators(),
                    $this->dateHydrators(),
                    [TerytSoapFunctions::POBIERZ_SLOWNIK_RODZAJOW_SIMC => new SIMCTypeHydrator()],

                )
            )
        );

        return new TerytSoapApi(new ActionAddingExecutor($builder->build()));
    }

    private function enumObjectHydrators(): array
    {
        $methods = [
            TerytSoapFunctions::POBIERZ_SLOWNIK_RODZAJOW_JEDNOSTEK,
            TerytSoapFunctions::POBIERZ_SLOWNIK_CECH_ULIC
        ];

        return array_combine(
            $methods,
            array_fill(0, count($methods), new EnumItemHydrator())
        );
    }

    private function catalogFileHydrators(): array
    {
        $methods = [
            TerytSoapFunctions::POBIERZ_KATALOG_TERC,
            TerytSoapFunctions::POBIERZ_KATALOG_TERC_ADR,
            TerytSoapFunctions::POBIERZ_KATALOG_NTS,
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC_ADR,
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC,
            TerytSoapFunctions::POBIERZ_KATALOG_SIMC_STAT,
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC,
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC_ADR,
            TerytSoapFunctions::POBIERZ_KATALOG_ULIC_BEZ_DZIELNIC,
            TerytSoapFunctions::POBIERZ_KATALOG_WMRODZ
        ];

        return array_combine(
            $methods,
            array_fill(0, count($methods), new CatalogFileHydrator())
        );
    }

    private function dateHydrators(): array
    {
        $methods = [
            TerytSoapFunctions::POBIERZ_DATE_AKTUALNGO_KAT_TERC,
            TerytSoapFunctions::POBIERZ_DATE_AKTUALNGO_KAT_NTS,
            TerytSoapFunctions::POBIERZ_DATE_AKTUALNGO_KAT_SIMC,
            TerytSoapFunctions::POBIERZ_DATE_AKTUALNGO_KAT_ULIC,
        ];

        return array_combine(
            $methods,
            array_fill(0, count($methods), new DateHydrator())
        );
    }
}
