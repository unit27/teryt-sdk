<?php

namespace Goosfraba\Teryt\Soap;

final class Dsn
{
    private const SCHEME = "gus+teryt";
    private const ENV_PROD = "prod";
    private const ENV_TEST = "test";

    private string $env;
    private string $user;
    private string $password;

    private function __construct(string $env, string $user, string $password)
    {
        $this->env = $env;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Return the user
     *
     * @return string
     */
    public function user(): string
    {
        return $this->user;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function isProd(): bool
    {
        return $this->env === self::ENV_PROD;
    }

    public static function test(): self
    {
        return new self(self::ENV_TEST, "TestPubliczny", "1234abcd");
    }

    public static function prod(string $user, string $password): self
    {
        return new self(self::ENV_PROD, $user, $password);
    }

    public static function parse(string $dsn): self
    {
        $arUrl = @parse_url($dsn);
        if (!$arUrl) {
            throw new \InvalidArgumentException(sprintf("Could not parse given DSN of \"%s\"", $dsn));
        }

        if ($arUrl['scheme'] !== self::SCHEME) {
            throw new \InvalidArgumentException(
                sprintf(
                    "The only supported scheme is \"%s\" but \"%s\" given.",
                    self::SCHEME,
                    $arUrl["scheme"]
                )
            );
        }

        if (strtolower($arUrl["host"]) === self::ENV_PROD) {
            return self::prod($arUrl["user"], $arUrl["pass"]);
        }

        return self::test();
    }
}
