<?php

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\TercUnit;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class TercUnitHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction)
    {
        $resultKey = $soapFunction."Result";
        if (!@$result->{$resultKey}) {
            throw new HydrationException(
                sprintf(
                    "Could not hydrate the result of \"%s\" function. Missing expected \"%s\" key.",
                    $soapFunction,
                    $resultKey
                )
            );
        }

        return array_map([$this, "mapTerytUnit"], (array)$result->{$resultKey}->JednostkaTerytorialna ?? []);
    }

    private function mapTerytUnit(\stdClass $terytUnit): TercUnit
    {
        return new TercUnit(
            $terytUnit->WOJ,
            $terytUnit->POW,
            $terytUnit->GMI,
            $terytUnit->NAZWA,
            $terytUnit->NAZWA_DOD,
            $terytUnit->RODZ,
            date_create_immutable($terytUnit->STAN_NA)
        );
    }
}
