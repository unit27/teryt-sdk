<?php

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\SIMCType;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class StreetsHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction)
    {
        if (isset($result->WyszukajUliceResult->Ulica) === false) {
            return [];
        }

        $data = $result->WyszukajUliceResult->Ulica;
        return \is_array($data) ? $data : [$data];
    }
}
