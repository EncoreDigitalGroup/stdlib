<?php

namespace EncoreDigitalGroup\StdLib\Objects\Geography\Country;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum UnitedStates: string
{
    use HasEnumValue;

    case Alabama = "alabama";
    case Alaska = "alaska";
    case Arizona = "arizona";
    case Arkansas = "arkansas";
    case California = "california";
    case Colorado = "colorado";
    case Connecticut = "connecticut";
    case Delaware = "delaware";
    case Florida = "florida";
    case Georgia = "georgia";
    case Hawaii = "hawaii";
    case Idaho = "idaho";
    case Illinois = "illinois";
    case Indiana = "indiana";
    case Iowa = "iowa";
    case Kansas = "kansas";
    case Kentucky = "kentucky";
    case Louisiana = "louisiana";
    case Maine = "maine";
    case Maryland = "maryland";
    case Massachusetts = "massachusetts";
    case Michigan = "michigan";
    case Minnesota = "minnesota";
    case Mississippi = "mississippi";
    case Missouri = "missouri";
    case Montana = "montana";
    case Nebraska = "nebraska";
    case Nevada = "nevada";
    case NewHampshire = "new_hampshire";
    case NewJersey = "new_jersey";
    case NewMexico = "new_mexico";
    case NewYork = "new_york";
    case NorthCarolina = "north_carolina";
    case NorthDakota = "north_dakota";
    case Ohio = "ohio";
    case Oklahoma = "oklahoma";
    case Oregon = "oregon";
    case Pennsylvania = "pennsylvania";
    case RhodeIsland = "rhode_island";
    case SouthCarolina = "south_carolina";
    case SouthDakota = "south_dakota";
    case Tennessee = "tennessee";
    case Texas = "texas";
    case Utah = "utah";
    case Vermont = "vermont";
    case Virginia = "virginia";
    case Washington = "washington";
    case WestVirginia = "west_virginia";
    case Wisconsin = "wisconsin";
    case Wyoming = "wyoming";

    public function abbreviated(): string
    {
        return match ($this) {
            self::Alabama => "AL",
            self::Alaska => "AK",
            self::Arizona => "AZ",
            self::Arkansas => "AR",
            self::California => "CA",
            self::Colorado => "CO",
            self::Connecticut => "CT",
            self::Delaware => "DE",
            self::Florida => "FL",
            self::Georgia => "GA",
            self::Hawaii => "HI",
            self::Idaho => "ID",
            self::Illinois => "IL",
            self::Indiana => "IN",
            self::Iowa => "IA",
            self::Kansas => "KS",
            self::Kentucky => "KY",
            self::Louisiana => "LA",
            self::Maine => "ME",
            self::Maryland => "MD",
            self::Massachusetts => "MA",
            self::Michigan => "MI",
            self::Minnesota => "MN",
            self::Mississippi => "MS",
            self::Missouri => "MO",
            self::Montana => "MT",
            self::Nebraska => "NE",
            self::Nevada => "NV",
            self::NewHampshire => "NH",
            self::NewJersey => "NJ",
            self::NewMexico => "NM",
            self::NewYork => "NY",
            self::NorthCarolina => "NC",
            self::NorthDakota => "ND",
            self::Ohio => "OH",
            self::Oklahoma => "OK",
            self::Oregon => "OR",
            self::Pennsylvania => "PA",
            self::RhodeIsland => "RI",
            self::SouthCarolina => "SC",
            self::SouthDakota => "SD",
            self::Tennessee => "TN",
            self::Texas => "TX",
            self::Utah => "UT",
            self::Vermont => "VT",
            self::Virginia => "VA",
            self::Washington => "WA",
            self::WestVirginia => "WV",
            self::Wisconsin => "WI",
            self::Wyoming => "WY",
        };
    }
}