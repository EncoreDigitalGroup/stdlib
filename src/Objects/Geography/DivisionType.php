<?php

namespace EncoreDigitalGroup\StdLib\Objects\Geography;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum DivisionType: string
{
    use HasEnumValue;

    case State = "state";
    case Province = "province";
    case Region = "region";

    public static function country(Country $country): self
    {
        return match ($country) {
            // States
            Country::Australia,
            Country::Brazil,
            Country::Germany,
            Country::India,
            Country::Malaysia,
            Country::Mexico,
            Country::Micronesia,
            Country::Nigeria,
            Country::SouthSudan,
            Country::Sudan,
            Country::UnitedStates,
            Country::Venezuela => self::State,

            // Provinces
            Country::Afghanistan,
            Country::Argentina,
            Country::Belgium,
            Country::Bulgaria,
            Country::Canada,
            Country::China,
            Country::DemocraticRepublicOfTheCongo,
            Country::Ecuador,
            Country::Indonesia,
            Country::Iran,
            Country::Iraq,
            Country::Italy,
            Country::Kazakhstan,
            Country::Laos,
            Country::Madagascar,
            Country::Netherlands,
            Country::Pakistan,
            Country::PapuaNewGuinea,
            Country::Philippines,
            Country::Rwanda,
            Country::SolomonIslands,
            Country::SouthAfrica,
            Country::Spain,
            Country::SriLanka,
            Country::Thailand,
            Country::Turkey,
            Country::Vanuatu,
            Country::Vietnam,
            Country::Zambia,
            Country::Zimbabwe => self::Province,

            // Default to Region for all other countries
            default => self::Region,
        };
    }
}