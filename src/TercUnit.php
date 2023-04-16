<?php

namespace Goosfraba\Teryt;

final class TercUnit
{
    private ?string $WOJ = null;
    private ?string $POW = null;
    private ?string $GMI = null;

    private ?string $NAZWA = null;

    private ?string $NAZWA_DOD = null;
    private ?string $RODZ = null;
    private ?\DateTimeInterface $STAN_NA;

    public function __construct(
        ?string $WOJ = null,
        ?string $POW = null,
        ?string $GMI = null,
        ?string $NAZWA = null,
        ?string $NAZWA_DOD = null,
        ?string $RODZ = null,
        ?\DateTimeInterface $STAN_NA = null
    ) {
        $this->WOJ = $WOJ;
        $this->POW = $POW;
        $this->GMI = $GMI;
        $this->NAZWA = $NAZWA;
        $this->NAZWA_DOD = $NAZWA_DOD;
        $this->RODZ = $RODZ;
        $this->STAN_NA = $STAN_NA;
    }

    public function WOJ(): ?string
    {
        return $this->WOJ;
    }

    public function POW(): ?string
    {
        return $this->POW;
    }

    public function GMI(): ?string
    {
        return $this->GMI;
    }

    public function NAZWA(): ?string
    {
        return $this->NAZWA;
    }

    public function NAZWA_DOD(): ?string
    {
        return $this->NAZWA_DOD;
    }

    public function RODZ(): ?string
    {
        return $this->RODZ;
    }

    public function STAN_NA(): ?\DateTimeInterface
    {
        return $this->STAN_NA;
    }
}
