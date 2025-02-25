<?php declare(strict_types = 1);

namespace Contributte\Invoice\Templates\Template;

use Contributte\Invoice\Data\Extension\IAccountNumber;
use Contributte\Invoice\Data\Extension\IConstantSymbol;
use Contributte\Invoice\Data\Extension\ISpecificSymbol;
use Contributte\Invoice\Data\Extension\IVariableSymbol;
use Contributte\Invoice\Data\IOrder;
use Contributte\Invoice\Templates\Translator\ITranslator;
use WebChemistry\SvgPdf\Pdf\Color;

class TuroisoTemplateObject extends TemplateObject {

	/** @var Color[] */
	public array $colors;

	/** @var string[] */
	public array $leftHeaderLeft;

	/** @var string[] */
	public array $leftHeaderRight;

	/** @var string[] */
	public array $rightHeader;

	/** @var string[] */
	public array $leftSubheader;

	/** @var string[] */
	public array $rightSubheader;

	public function __construct(IOrder $order, ITranslator $translator) {
		parent::__construct($order, $translator);

		$company = $order->getCompany();
		$customer = $order->getCustomer();
		$payment = $order->getPayment();
		$account = $payment->getFirstAccount();

		$this->colors = [
			"primary" => new Color(254, 206, 84),
			"secondary" => new Color(11, 29, 38),
			"text" => Color::black(),
			"white" => Color::white(),
			"even" => new Color(241, 240, 240),
			"odd" => Color::white(),
		];

		$this->leftHeaderLeft = array_filter([
			$this->implode([$company->getZip(), $company->getTown()], " "),
			$company->getAddress(),
			$company->getCountry(),
		]);

		$this->leftHeaderRight = array_filter([
			$this->prepend($translator->translate("crn") . ": ", $company->getId()),
			$this->prepend($translator->translate("vatNumber") . ": ", $company->getVatNumber()),
			!$company->getVatNumber() ? $this->prepend($translator->translate("nonVatPayer"), "") : false,
		]);

		$this->rightHeader = [
			$translator->translate("issueDate") . ": " . $order->getTimestamps()->getCreated(),
			$translator->translate("invoiceNumber") . ": " . $order->getNumber(),
		];

		$this->leftSubheader = array_filter([
			$customer->getName(),
			$this->implode([$customer->getZip(), $customer->getTown()], ", "),
			$customer->getAddress(),
			$customer->getCountry(),
			$this->prepend($translator->translate("crn") . ": ", $customer->getId()),
			$this->prepend($translator->translate("vatNumber") . ": ", $customer->getVatNumber()),
		]);

		$this->rightSubheader = array_filter([
			$this->prepend($translator->translate("dueDate") . ": ", $order->getTimestamps()->getDueTo()),
			$account instanceof IAccountNumber ?
				$this->prepend($translator->translate("accountNumber") . ": ", $account->getAccountNumber()) : null,
			$this->prepend($translator->translate("iban") . ": ", $account?->getIban()),
			$payment instanceof IVariableSymbol ?
				$this->prepend($translator->translate("variableSymbol") . ": ", $payment->getVariableSymbol()) : null,
			$payment instanceof IConstantSymbol ?
				$this->prepend($translator->translate("constantSymbol") . ": ", $payment->getConstantSymbol()) : null,
			$payment instanceof ISpecificSymbol ?
				$this->prepend($translator->translate("specificSymbol") . ": ", $payment->getSpecificSymbol()) : null,
		]);
	}

}
