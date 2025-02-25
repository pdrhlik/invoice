<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates;

use Pdrhlik\Invoice\Data\IOrder;
use Pdrhlik\Invoice\Templates\Template\TemplateObject;
use Exception;
use LogicException;
use WebChemistry\SvgPdf\PdfSvg;

abstract class Template implements ITemplate
{

	public function __construct(
		private PdfSvg $renderer,
	)
	{
	}

	public function getRenderer(): PdfSvg
	{
		return $this->renderer;
	}

	public function renderToPdf(IOrder $order): string
	{
		return $this->renderTemplate($order);
	}

	public function renderToSvg(IOrder $order): string
	{
		ob_start();

		$template = $this->createTemplateObject($order);
		require $this->getTemplate();

		$content = ob_get_clean();

		if ($content === false) {
			throw new LogicException(sprintf('Cannot get content from template %s', $this->getTemplate()));
		}

		return $content;
	}

	protected function renderTemplate(IOrder $order): string
	{
		return $this->renderer->toPdf($this->renderToSvg($order))->toString();
	}

	abstract protected function getTemplate(): string;

	abstract protected function createTemplateObject(IOrder $order): TemplateObject;

	/**
	 * Roughly splits text into lines based on supplied max width and font size.
	 * It is not precisely accurate but it works in most scenarios.
	 *
	 * @param string $text     Text to be split.
	 * @param int    $maxWidth Max width in page units.
	 * @param int    $fontSize Font size in page units.
	 *
	 * @return array<string>
	 */
	public static function splitTextToLines(string $text, int $maxWidth = 300, int $fontSize = 8): array {
		$words = explode(" ", trim($text));
		$lines = [];
		$currentLine = "";

		foreach ($words as $word) {
			$testLine = $currentLine ? $currentLine . " " . trim($word) : trim($word);
			// Rough estimate: assume 0.6 * fontSize per character for width
			$approxWidth = strlen($testLine) * ($fontSize * 0.6);
			if ($approxWidth <= $maxWidth) {
				$currentLine = $testLine;
			} else {
				$lines[] = $currentLine;
				$currentLine = $word;
			}
		}
		if ($currentLine) {
			$lines[] = $currentLine;
		}
		return $lines;
	}

}
