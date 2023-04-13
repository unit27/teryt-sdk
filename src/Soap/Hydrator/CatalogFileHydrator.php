<?php

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\CatalogFile;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class CatalogFileHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction)
    {

        $resultKey = $soapFunction . 'Result';
        $fileResult = @$result->{$resultKey};
        if (!$fileResult) {
            throw new HydrationException(
                sprintf(
                    "Could not hydrate the result of \"%s\" function. Missing expected \"%s\" key.",
                    $soapFunction,
                    $resultKey
                )
            );
        }

        return new CatalogFile(
            (string)@$fileResult->nazwa_pliku,
            (string)@$fileResult->plik_zawartosc,
            (string)@$fileResult->opis
        );
    }
}
