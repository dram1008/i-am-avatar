<?php

namespace app\services;

use app\models\Orders;
use app\models\Transaction;
use Blocktrail\SDK\BlocktrailSDK;
use common\components\marketing\Marketing;
use common\models\Billing;
use common\models\Config;
use common\models\Countries;
use common\models\Currency;
use common\services\Debugger;
use Yii;
use common\components\payments\classes\BasePayment;
use common\models\PaymentSystem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

use pjhl\multilanguage\helpers\Languages;
use yii\httpclient\Client;

class BitCoinBlockTrailPayment
{
    public $url = 'https://api.blocktrail.com/v1/BTC';
    public $apiKey = '181b582f0c99fcdbd1d92e843fbe2fa31f6ecb95';
    public $apiKeySecret = '2674b9edb5274d3eca2d352b23ef898a7fa8119b';

    public function getForm()
    {
        $btc = BlocktrailSDK::toBTC(789);

        $client = new BlocktrailSDK($this->apiKey, $this->apiKeySecret);
        $wallet = $client->initWallet("mywallet-c8f0835c69ab5586", "dram10081");
        // создаю новый адрес для зачисления платежа
        $address = $wallet->getNewAddress();
        // создаю подписчика
        $newWebhook = $client->setupWebhook('https://www.galaxysss.com/shop/order/success?type=btc&billing_id=123', 'my-webhook-id');
        // подписываюсь на приход денег в кошелек
        $client->subscribeAddressTransactions('my-webhook-id', $address, 6);
    }

    /**
     *
    [
    "network" => "BTC",
    "data" => [
    "hash" => "8fa29a1db30aceed2ec5afb2bcdf6196207975780b4ca5f3f1d6313cab855fe7",
    "time" => "2014-08-25T09:29:28+0000",
    "confirmations" => 3948,

    "...etc..." => "...etc..."
    ],
    "addresses" => [
    "1qMBuZnrmGoAc2MWyTnSgoLuWReDHNYyF" => −2501000
    ],
    ]
     *     *
     */
    public function confirm()
    {

    }

}

