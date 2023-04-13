<?php

namespace Goosfraba\Teryt\Soap\Hydrator;

use Goosfraba\Teryt\SIMCType;
use Webit\SoapApi\Executor\Exception\HydrationException;
use Webit\SoapApi\Hydrator\Hydrator;

final class SIMCTypeHydrator implements Hydrator
{
    /**
     * @inheritDoc
     */
    public function hydrateResult($result, $soapFunction)
    {
        $result = @$result->PobierzSlownikRodzajowSIMCResult;
        $types = $result ? @$result->RodzajMiejscowosci : null;
        if ($types === null) {
            throw new HydrationException(
                sprintf(
                    "Could not hydrate the result of \"%s\" function. Missing expected \"PobierzSlownikRodzajowSIMCResult.RodzajMiejscowosci\" key.",
                    $soapFunction,
                )
            );
        }

        return array_map([$this, "hydrateSIMCType"], $types);
    }

    /**
     * Hydrates the \stdClass into SIMCType
     *
     * @param \stdClass $type
     * @return SIMCType
     */
    private function hydrateSIMCType(\stdClass $type): SIMCType
    {
        return new SIMCType($type->Symbol, $type->Nazwa, $type->Opis ?: null);
    }
}
