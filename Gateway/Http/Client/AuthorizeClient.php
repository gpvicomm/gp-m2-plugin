<?php

namespace ViComm\PaymentGateway\Gateway\Http\Client;

use Vicomm\Vicomm;
use ViComm\PaymentGateway\Gateway\Config\CardConfig;
use ViComm\PaymentGateway\Gateway\Config\GatewayConfig;
use ViComm\PaymentGateway\Model\Adminhtml\Source\Currency;

class AuthorizeClient extends AbstractClient
{
    /**
     * AuthorizeClient constructor.
     * @param ViComm $adapter
     * @param GatewayConfig $gateway_config
     * @param CardConfig $config
     */
    public function __construct(ViComm $adapter, GatewayConfig $gateway_config, CardConfig $config)
    {
        parent::__construct($adapter, $gateway_config);
        $this->config = $config;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    protected function process(array $request_body)
    {
        $is_production = $this->config->isProduction();
        $credentials = $this->config->getServerCredentials();

        $this->adapter->init($credentials['application_code'], $credentials['application_key'], $is_production);

        $charge = $this->adapter::charge();
        $card_token = $request_body['card']['token'];
        $order = $request_body['order'];
        $user = $request_body['user'];
        
        $order_obj = $request_body['objects']['order'];

        if (Currency::validateForAuthorize($order_obj->getCurrencyCode())) {
            $this->logger->debug('AuthorizeClient.process Consuming Authorize...');
            $response = $charge->authorize($card_token, $order, $user);
        } else {
            $this->logger->debug('AuthorizeClient.process Consuming Debit...');
            $response = $charge->create($card_token, $order, $user);
        }

        return (array)$response;
    }
}
