<?php

namespace Goosfraba\Teryt;

/**
 * Represents the TERYT catalog file
 */
final class CatalogFile
{
    private string $name;
    private string $content;
    private ?string $description;

    public function __construct(string $name, string $content, ?string $description = null)
    {
        $this->name = $name;
        $this->content = $content;
        $this->description = $description;
    }

    /**
     * Gets the suggested file name
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Gets the base64 encoded file content
     *
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }

    /**
     * Gets the additional file description
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Dumps the content of the file to given path
     *
     * @param string|null $pathname the pathname of the file content should be dumped to
     * @return \SplFileObject
     */
    public function dump(?string $pathname = null): \SplFileObject
    {
        $pathname = $pathname ?? (tempnam(sys_get_temp_dir(), $this->name).".zip");

        if (false === @file_put_contents($pathname, base64_decode($this->content))) {
            throw new \RuntimeException(
                sprintf("Could not not dump the content of the file to \"%s\"", $pathname)
            );
        }

        return new \SplFileObject($pathname);
    }
}
