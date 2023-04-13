<?php

namespace Goosfraba\Teryt\Soap\Ws;

/**
 * Represents the WS Action
 */
final class WsHeaderAction
{
    private const WSA_NAMESPACE = 'http://www.w3.org/2005/08/addressing';

    private string $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * Creates the WsAction header
     *
     * @param string $action
     * @return self
     */
    public static function create(string $action): self
    {
        return new self($action);
    }

    /**
     * Creates an instance of \SoapHeader
     */
    public function toSoapHeader(): \SoapHeader
    {
        return new \SoapHeader(
            self::WSA_NAMESPACE,
            "Action",
            new \SoapVar($this->action, XSD_STRING)
        );
    }
}
