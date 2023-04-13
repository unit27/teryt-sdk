<?php

namespace Goosfraba\Teryt\Soap\Executor;

use Goosfraba\Teryt\Soap\Ws\WsHeaderAction;
use Webit\SoapApi\Executor\SoapApiExecutor;

final class ActionAddingExecutor implements SoapApiExecutor
{
    private const ACTION_PREFIX = "http://tempuri.org/ITerytWs1/";

    private SoapApiExecutor $innerExecutor;

    public function __construct(SoapApiExecutor $innerExecutor)
    {
        $this->innerExecutor = $innerExecutor;
    }

    /**
     * @inheritDoc
     */
    public function executeSoapFunction($soapFunction, $input = null, array $options = [], array $headers = [])
    {
        $headers[] = WsHeaderAction::create(self::ACTION_PREFIX . $soapFunction)->toSoapHeader();

        return $this->innerExecutor->executeSoapFunction(
            $soapFunction,
            $input,
            $options,
            $headers
        );
    }
}
