<?php declare(strict_types = 1);

namespace Contributte\Invoice;

use Nette\SmartObject;

class Translator implements ITranslator
{

	use SmartObject;

	public const ENGLISH = 'en',
		CZECH = 'cs';

	/** @var mixed[] */
	private static $translations = [
		'cs' => [
			'subscriber' => 'Odběratel',
			'vat' => 'IČ',
			'vaTin' => 'DIČ',
			'date' => 'Datum vystavení',
			'invoice' => 'Faktura',
			'invoiceNumber' => 'Číslo faktury',
			'taxPay' => 'Plátce DPH',
			'notTax' => 'Neplátce DPH',
			'paymentData' => 'Platební údaje',
			'page' => 'Stránka',
			'from' => 'z',
			'totalPrice' => 'Celková částka',
			'item' => 'Položka',
			'count' => 'Počet',
			'pricePerItem' => 'Cena za ks',
			'total' => 'Celkem',
			'accountNumber' => 'Číslo účtu',
			'swift' => 'Swift',
			'iban' => 'Iban',
			'varSymbol' => 'Variabilní symbol',
			'constSymbol' => 'Konstant. symbol',
			'tax' => 'DPH',
			'subtotal' => 'Mezisoučet',
			'dueDate' => 'Datum splatnosti',
		],
		'en' => [
			'subscriber' => 'Subscriber',
			'vat' => 'VAT number',
			'vaTin' => 'VATIN',
			'date' => 'Date',
			'invoice' => 'Invoice',
			'invoiceNumber' => 'Invoice number',
			'taxPay' => '',
			'notTax' => 'VAT unregistered',
			'paymentData' => 'Payment information',
			'page' => 'Page',
			'from' => '/',
			'totalPrice' => 'Total price',
			'item' => 'Item',
			'count' => 'Quantity',
			'pricePerItem' => 'Price per item',
			'total' => 'Total',
			'accountNumber' => 'Account number',
			'swift' => 'Swift',
			'iban' => 'Iban',
			'varSymbol' => 'Variable symbol',
			'constSymbol' => 'Constant symbol',
			'tax' => 'TAX',
			'subtotal' => 'Subtotal',
			'dueDate' => 'Due date',
		],
	];

	/** @var string */
	private $lang;

	public function __construct(string $lang = self::ENGLISH)
	{
		$this->lang = $lang;
		if (!isset(self::$translations[$this->lang])) {
			throw new InvoiceException(sprintf('Language %s not exists.', $lang));
		}
	}

	public function translate(string $message): string
	{
		return self::$translations[$this->lang][$message];
	}

}
