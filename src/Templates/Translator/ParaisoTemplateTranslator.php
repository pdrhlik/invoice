<?php declare(strict_types = 1);

namespace Contributte\Invoice\Templates\Translator;

use InvalidArgumentException;

class ParaisoTemplateTranslator implements ITranslator
{

	/** @var mixed[] */
	protected array $translations = [
		'en' => [
			'Invoice' => 'Invoice',
			'Discount' => 'Discount',
			'Payment Info' => 'Payment Info',
			'Total price' => 'Total price',
			'Invoice from' => 'Invoice from',
			'Invoice to' => 'Invoice to',
			'ID' => 'ID',
			'VAT Number' => 'VAT Number',
			'Invoice No.' => 'Invoice No.',
			'Invoice date' => 'Invoice date',
			'Invoice due to' => 'Invoice due to',
			'Account number' => 'Account number',
			'IBAN' => 'IBAN',
			'Variable symbol' => 'Variable symbol',
			'Constant symbol' => 'Constant symbol',
			'Specific symbol' => 'Specific symbol',
		],
	];

	public function __construct(
		private string $lang = 'en',
	)
	{
		if (!isset($this->translations[$this->lang])) {
			throw new InvalidArgumentException(sprintf('Translation language %s not exists', $this->lang));
		}
	}

	/**
	 * @param mixed[] $translations
	 */
	public function addLanguage(string $lang, array $translations): void
	{
		$this->translations[$lang] = $translations;
	}

	public function translate(string $message): string
	{
		return $this->translations[$this->lang][$message] ?? $message;
	}

}
