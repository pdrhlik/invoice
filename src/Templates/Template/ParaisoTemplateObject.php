<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates\Template;

use Pdrhlik\Invoice\Data\Extension\IAccountNumber;
use Pdrhlik\Invoice\Data\Extension\IConstantSymbol;
use Pdrhlik\Invoice\Data\Extension\ISpecificSymbol;
use Pdrhlik\Invoice\Data\Extension\IVariableSymbol;
use Pdrhlik\Invoice\Data\IOrder;
use Pdrhlik\Invoice\Data\ISubject;
use Pdrhlik\Invoice\Templates\Translator\ITranslator;

class ParaisoTemplateObject extends TemplateObject
{

	/** @var string[] */
	protected array $invoiceFrom;

	/** @var string[] */
	protected array $invoiceTo;

	/** @var string[] */
	protected array $invoiceInfo;

	/** @var string[] */
	protected array $paymentInfo;

	protected ?string $footer = null;

	public function __construct(IOrder $order, ITranslator $translator)
	{
		parent::__construct($order, $translator);

		$company = $order->getCompany();

		$this->invoiceFrom = array_filter([
			$translator->translate('seller'),
			$company->getName(),
			$this->toFullAddress($company),
			$this->prepend($translator->translate('crn') . ': ', $company->getId()),
			$this->prepend($translator->translate('vatNumber') . ': ', $company->getVatNumber()),
		]);

		$customer = $order->getCustomer();
		$this->invoiceTo = array_filter([
			$translator->translate('customer'),
			$customer->getName(),
			$this->toFullAddress($customer),
			$this->prepend($translator->translate('crn') . ': ', $customer->getId()),
			$this->prepend($translator->translate('vatNumber') . ': ', $customer->getVatNumber()),
		]);

		$timestamps = $order->getTimestamps();
		$this->invoiceInfo = array_filter([
			sprintf('%s %s', $translator->translate('invoiceNumber'), $order->getNumber()),
			sprintf('%s: %s', $translator->translate('issueDate'), $timestamps->getCreated()),
			$this->prepend($this->translate('dueDate') . ': ', $timestamps->getDueTo()),
		]);

		$payment = $order->getPayment();
		$account = $payment->getFirstAccount();
		$this->paymentInfo = array_filter([
			$this->prepend(
				$translator->translate('accountNumber') . ': ',
				$account instanceof IAccountNumber ? $account->getAccountNumber() : null
			),
			$this->prepend($translator->translate('iban') . ': ', $account?->getIban()),
			$this->prepend(
				$translator->translate('variableSymbol') . ': ',
				$payment instanceof IVariableSymbol ? $payment->getVariableSymbol() : null
			),
			$this->prepend(
				$translator->translate('constantSymbol') . ': ',
				$payment instanceof IConstantSymbol ? $payment->getConstantSymbol() : null,
			),
			$this->prepend(
				$translator->translate('specificSymbol') . ': ',
				$payment instanceof ISpecificSymbol ? $payment->getSpecificSymbol() : null,
			)
 		]);
	}

	/**
	 * @return string[]
	 */
	public function getInvoiceFrom(): array
	{
		return $this->invoiceFrom;
	}

	/**
	 * @return string[]
	 */
	public function getInvoiceTo(): array
	{
		return $this->invoiceTo;
	}

	/**
	 * @return string[]
	 */
	public function getInvoiceInfo(): array
	{
		return $this->invoiceInfo;
	}

	/**
	 * @return string[]
	 */
	public function getPaymentInfo(): array
	{
		return $this->paymentInfo;
	}

	public function getFooter(): ?string
	{
		return $this->footer;
	}

	private function toFullAddress(ISubject $subject): string
	{
		return implode(', ', array_filter([
			$subject->getAddress(),
			$subject->getTown(),
			$subject->getZip(),
			$subject->getCountry(),
		]));
	}

}
