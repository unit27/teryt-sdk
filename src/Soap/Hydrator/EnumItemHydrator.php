<?php

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\EnumItem;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class EnumItemHydrator implements Hydrator
{
    public function hydrateResult($result, $soapFunction)
    {
        $resultKey = $soapFunction . 'Result';
        $result = @$result->{$resultKey};
        $result = $result ? $result->string : null;

        if ($result === null) {
            throw new HydrationException(
                sprintf(
                    "Could not hydrate the result of \"%s\" function. Missing expected \"%s.string\" key.",
                    $soapFunction,
                    $resultKey
                )
            );
        }

        return array_map([$this, "hydrateString"], $result);
    }

    /**
     * Hydrates given string into EnumItem
     *
     * @param string $string
     * @return EnumItem
     */
    private function hydrateString(string $string): EnumItem
    {
        $arString = explode(",", $string, 2);
        list($key, $value) = $arString;

        return new EnumItem(trim($key), trim($value));
    }
}
