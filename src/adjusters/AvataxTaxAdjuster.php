<?php 

namespace matternow\avatax\adjusters;

use Avalara\TransactionSummary;
use matternow\avatax\services\SalesTaxService;

use Craft;
use craft\base\Component;
use craft\commerce\base\AdjusterInterface;
use craft\commerce\elements\Order;
use craft\commerce\models\OrderAdjustment;

class AvataxTaxAdjuster extends Component implements AdjusterInterface
{

    public function adjust(Order $order): array
    {
        $adjustments = [];

        if($order->shippingAddress !== NULL && sizeof($order->getLineItems()) > 0)
        {
            $taxService = new SalesTaxService;

            /* @var TransactionSummary[] $taxSummary */
            $taxSummary = $taxService->createSalesOrder($order);

            foreach ($taxSummary as $taxAdjustment) {
                $adjustment = new OrderAdjustment;

                $adjustment->type = 'tax';
                $adjustment->name = $taxAdjustment->taxName;
                $adjustment->description = ((string) $taxAdjustment->rate * 100) . '% ' . $taxAdjustment->jurisType . ' ' . $taxAdjustment->taxType . ' Tax';
                $adjustment->sourceSnapshot = [ 'avatax' => $taxAdjustment->tax];
                $adjustment->amount = +$taxAdjustment->tax;
                $adjustment->setOrder($order);
                $adjustments[] = $adjustment;
            }
        }

        return $adjustments;
    }

}
