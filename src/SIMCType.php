<?php

namespace Goosfraba\Teryt;

/**
 * Represents SIMC Type
 */
final class SIMCType
{
    private string $symbol;
    private string $name;
    private ?string $description;

    public function __construct(string $symbol, string $name, ?string $description)
    {
        $this->symbol = $symbol;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Gets the symbol
     *
     * @return string
     */
    public function symbol(): string
    {
        return $this->symbol;
    }

    /**
     * Gets the name
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Gets the description
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }
}
