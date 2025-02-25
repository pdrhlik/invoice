<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates\Translator;

interface ITranslator
{

	public function translate(string $message): string;

}
