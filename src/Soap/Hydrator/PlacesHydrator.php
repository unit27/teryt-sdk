<?php declare(strict_types=1);

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\SIMCType;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class PlacesHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction): array
    {
        if (isset($result->WyszukajMiejscowoscResult->Miejscowosc) === false) {
            return [];
        }

        $data = $result->WyszukajMiejscowoscResult->Miejscowosc;
        return \is_array($data) ? $data : [$data];
    }
}
