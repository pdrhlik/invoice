<?php declare(strict_types = 1);

namespace Pdrhlik\Invoice\Templates\Translator;

final class TuroisoTemplateTranslator extends Translator {

	public function __construct(string $lang = "en") {
		$this->addLanguage("en", [
			"invoice" => "INVOICE",
			"payment" => "PAYMENT",
			"totalPrice" => "Total price",
			"customer" => "CUSTOMER",
			"item" => "Item",
			"crn" => "CRN",
			"unitPrice" => "Unit price",
			"price" => "Price",
			"quantity" => "Quantity",
			"vatNumber" => "VAT Number",
			"nonVatPayer" => "Non-VAT payer",
			"invoiceNumber" => "Invoice number",
			"issueDate" => "Date",
			"dueDate" => "Due date",
			"accountNumber" => "Account number",
			"iban" => "IBAN",
			"variableSymbol" => "Variable symbol",
			"constantSymbol" => "Constant symbol",
			"specificSymbol" => "Specific symbol",
		]);

		$this->addLanguage("cs", [
			"invoice" => "Faktura",
			"payment" => "Platba",
			"totalPrice" => "Celková částka",
			"customer" => "Odběratel",
			"item" => "Položka",
			"crn" => "IČ",
			"unitPrice" => "Cena za ks",
			"price" => "Cena",
			"quantity" => "Počet",
			"vatNumber" => "DIČ",
			"nonVatPayer" => "Neplátce DPH",
			"invoiceNumber" => "Číslo faktury",
			"issueDate" => "Datum vystavení",
			"dueDate" => "Datum splatnosti",
			"accountNumber" => "Číslo účtu",
			"iban" => "IBAN",
			"variableSymbol" => "Variabilní symbol",
			"constantSymbol" => "Konstantní symbol",
			"specificSymbol" => "Specifický symbol",
		]);

		$this->addLanguage("de", [
			"invoice" => "Rechnung",
			"payment" => "Zahlung",
			"totalPrice" => "Gesamtpreis",
			"customer" => "Abonnent",
			"item" => "Artikel",
			"crn" => "USt-IdNr",
			"unitPrice" => "Preis pro Artikel",
			"price" => "Preis",
			"quantity" => "Menge",
			"vatNumber" => "Steuernummer",
			"nonVatPayer" => "MwSt. nicht registriert",
			"invoiceNumber" => "Rechnungsnummer",
			"issueDate" => "Datum",
			"dueDate" => "Fälligkeitsdatum",
			"accountNumber" => "Kontonummer",
			"iban" => "IBAN",
			"variableSymbol" => "Variabler Verwendungszweck",
			"constantSymbol" => "Konstanter Verwendungszweck",
			"specificSymbol" => "Spezifischer Verwendungszweck",
		]);

		$this->addLanguage("sk", [
			"invoice" => "Faktúra",
			"payment" => "Platba",
			"totalPrice" => "Celková suma",
			"customer" => "Odberateľ",
			"item" => "Položka",
			"crn" => "IČ",
			"unitPrice" => "Cena za položku",
			"price" => "Cena",
			"quantity" => "Množstvo",
			"vatNumber" => "DIČ",
			"nonVatPayer" => "Neplatca DPH",
			"invoiceNumber" => "Číslo faktúry",
			"issueDate" => "Dátum vystavenia",
			"dueDate" => "Dátum splatnosti",
			"accountNumber" => "Číslo účtu",
			"iban" => "IBAN",
			"variableSymbol" => "Variabilný symbol",
			"constantSymbol" => "Konštantný symbol",
			"specificSymbol" => "Špecifický symbol",
		]);

		$this->addLanguage("pl", [
			"invoice" => "Faktura",
			"payment" => "Płatność",
			"totalPrice" => "Cena całkowita",
			"customer" => "Odbiorca",
			"item" => "Pozycja",
			"crn" => "REGON",
			"unitPrice" => "Cena za pozycję",
			"price" => "Cena",
			"quantity" => "Ilość",
			"vatNumber" => "NIP",
			"nonVatPayer" => "Brak rejestracji VAT",
			"invoiceNumber" => "Numer faktury",
			"issueDate" => "Data wystawienia",
			"dueDate" => "Termin płatności",
			"accountNumber" => "Numer konta",
			"iban" => "IBAN",
			"variableSymbol" => "Symbol zmienny",
			"constantSymbol" => "Symbol stały",
			"specificSymbol" => "Symbol specyficzny",
		]);

		parent::__construct($lang);
	}

}
