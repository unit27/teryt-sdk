<?php declare(strict_types=1);

namespace Goosfraba\Teryt\Soap\Hydrator;

use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class DateHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction): \DateTimeImmutable|false
    {
        $resultKey = $soapFunction . "Result";
        $date = $result->{$resultKey};
        if (!$date) {
            throw new HydrationException(
                sprintf(
                    "Could not hydrate the result of \"%s\" function. Missing expected \"%s\" key.",
                    $soapFunction,
                    $resultKey
                )
            );
        }

        return date_create_immutable($date);
    }
}
