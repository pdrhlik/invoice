<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Preview;

use Pdrhlik\Invoice\Data\Account;
use Pdrhlik\Invoice\Data\Company;
use Pdrhlik\Invoice\Data\Customer;
use Pdrhlik\Invoice\Data\International\Czech\CzechAccount;
use Pdrhlik\Invoice\Data\International\Czech\CzechPaymentInformation;
use Pdrhlik\Invoice\Data\IOrder;
use Pdrhlik\Invoice\Data\Item;
use Pdrhlik\Invoice\Data\Order;
use Pdrhlik\Invoice\Data\PaymentInformation;
use Pdrhlik\Invoice\Data\Timestamps;
use DateTime;

final class PreviewFactory
{

	public static function createOrder(?int $itemCount = null): IOrder
	{
		$order = new Order(
			date('Y') . '0001',
			'$ 15.000,00',
			new Company("Hory.app", "Liberec", "Žitavská 133/59", "460 01", "Czech Republic", "CZ09504800", "09504800"),
			new Customer('John Doe', 'Los Angeles', 'Cavetown', '720 55', 'USA', 'CZ08304431', '08304431'),
			new PaymentInformation(
				[new Account('CZ4208000000001234567890')],
			),
			new Timestamps(
				(new DateTime())->format('Y-m-d'),
				(new DateTime('+ 1 week'))->format('Y-m-d'),
			),
		);

		self::addItems($order, $itemCount);

		return $order;
	}

	public static function createCzechOrder(?int $itemCount = null): IOrder
	{
		$order = new Order(
			date('Y') . '0001',
			'15.000,00 Kč',
			new Company("Hory.app", "Liberec", "Žitavská 133/59", "460 01", "Czech Republic", "CZ09504800", "09504800"),
			new Customer('John Doe', 'Los Angeles', 'Cavetown', '720 55', 'USA', 'CZ08304431', '08304431'),
			new CzechPaymentInformation(
				[new CzechAccount('1234567890/0800', 'CZ4208000000001234567890')],
				'0123456789',
				'0123',
				'1234',
			),
			new Timestamps(
				(new DateTime())->format('Y-m-d'),
				(new DateTime('+ 1 week'))->format('Y-m-d'),
			),
		);

		self::addItems($order, $itemCount, ':value Kč');

		return $order;
	}

	private static function addItems(IOrder $order, ?int $itemCount = null, string $format = '$ :value'): void
	{
		$format = fn (string $money) => str_replace(':value', $money, $format);
		$items = [
			new Item('Logitech G700s Rechargeable Gaming Mouse', $format('1.790,00'), 4, $format('7.160,00')),
			new Item('ASUS Z380KL 8" - 16GB, LTE', $format('6.490,00'), 1, $format('6.490,00')),
			new Item('Philips 48PFS6909 - 121cm', $format('13.990,00'), 1, $format('13.990,00')),
			new Item('HP Deskjet 3545 Advantage', $format('1.799,00'), 1, $format('1.799,00')),
			new Item('LG 105UC9V - 266cm', $format('11.599,00'), 1, $format('11.599,00')),
			new Item('Samsung Galaxy S21 Ultra 5G, 12GB/128GB', $format('31.490,00'), 1, $format('31.490,00')),
		];
		$count = count($items);

		if ($itemCount === null) {
			$itemCount = $count;
		} else {
			$itemCount = max($itemCount, 0);
		}

		if ($count < $itemCount) {
			$array = $items;
			for ($i = 0; $i < $itemCount - $count; $i++) {
				$array[] = $items[array_rand($items)];
			}

			$items = $array;
		} else {
			$items = array_slice($items, 0, $itemCount);
		}

		foreach ($items as $item) {
			$order->addItem($item);
		}
	}

}
