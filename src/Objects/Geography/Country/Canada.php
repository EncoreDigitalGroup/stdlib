<?php

namespace EncoreDigitalGroup\StdLib\Objects\Geography\Country;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum Canada: string
{
    use HasEnumValue;

    case Alberta = "alberta";
    case BritishColumbia = "british_columbia";
    case Manitoba = "manitoba";
    case NewBrunswick = "new_brunswick";
    case NewfoundlandAndLabrador = "newfoundland_and_labrador";
    case NovaScotia = "nova_scotia";
    case Ontario = "ontario";
    case PrinceEdwardIsland = "prince_edward_island";
    case Quebec = "quebec";
    case Saskatchewan = "saskatchewan";
    case NorthwestTerritories = "northwest_territories";
    case Nunavut = "nunavut";
    case Yukon = "yukon";

    public function abbreviated(): string
    {
        return match ($this) {
            self::Alberta => "AB",
            self::BritishColumbia => "BC",
            self::Manitoba => "MB",
            self::NewBrunswick => "NB",
            self::NewfoundlandAndLabrador => "NL",
            self::NovaScotia => "NS",
            self::Ontario => "ON",
            self::PrinceEdwardIsland => "PE",
            self::Quebec => "QC",
            self::Saskatchewan => "SK",
            self::NorthwestTerritories => "NT",
            self::Nunavut => "NU",
            self::Yukon => "YT",
        };
    }
}