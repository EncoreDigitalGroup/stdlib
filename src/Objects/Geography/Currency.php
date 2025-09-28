<?php

namespace EncoreDigitalGroup\StdLib\Objects\Geography;

use BadMethodCallException;
use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

/**
 * @method string format(float|int $amount, int $precision = 2)
 * @method static string format(float|int $amount, string $symbol, int $precision = 2, string $decimals = '.', string $thousands = ',')
 */
enum Currency: string
{
    use HasEnumValue;

    case UnitedStates = "united_states_dollar";
    case Eurozone = "euro";
    case Japan = "japanese_yen";
    case UnitedKingdom = "british_pound_sterling";
    case Australia = "australian_dollar";
    case Canada = "canadian_dollar";
    case Switzerland = "swiss_franc";
    case China = "chinese_yuan";
    case Sweden = "swedish_krona";
    case NewZealand = "new_zealand_dollar";
    case Mexico = "mexican_peso";
    case Singapore = "singapore_dollar";
    case HongKong = "hong_kong_dollar";
    case Norway = "norwegian_krone";
    case SouthKorea = "south_korean_won";
    case Turkey = "turkish_lira";
    case Russia = "russian_ruble";
    case India = "indian_rupee";
    case Brazil = "brazilian_real";
    case SouthAfrica = "south_african_rand";
    case Poland = "polish_zloty";
    case Thailand = "thai_baht";
    case Israel = "israeli_new_shekel";
    case Chile = "chilean_peso";
    case Philippines = "philippine_peso";
    case UnitedArabEmirates = "united_arab_emirates_dirham";
    case Czechia = "czech_koruna";
    case Indonesia = "indonesian_rupiah";
    case Malaysia = "malaysian_ringgit";
    case Hungary = "hungarian_forint";
    case Iceland = "icelandic_krona";
    case Croatia = "croatian_kuna";
    case Bulgaria = "bulgarian_lev";
    case Romania = "romanian_leu";
    case Denmark = "danish_krone";
    case Argentina = "argentine_peso";
    case Colombia = "colombian_peso";
    case Peru = "peruvian_sol";
    case Uruguay = "uruguayan_peso";
    case Paraguay = "paraguayan_guarani";
    case Bolivia = "bolivian_boliviano";
    case Venezuela = "venezuelan_bolivar";
    case Ecuador = "ecuadorian_sucre";
    case Guatemala = "guatemalan_quetzal";
    case CostaRica = "costa_rican_colon";
    case Panama = "panamanian_balboa";
    case Nicaragua = "nicaraguan_cordoba";
    case Honduras = "honduran_lempira";
    case ElSalvador = "salvadoran_colon";
    case Belize = "belize_dollar";
    case Jamaica = "jamaican_dollar";
    case TrinidadAndTobago = "trinidad_and_tobago_dollar";
    case Barbados = "barbadian_dollar";
    case Bahamas = "bahamian_dollar";
    case Cuba = "cuban_peso";
    case DominicanRepublic = "dominican_peso";
    case Haiti = "haitian_gourde";
    case EasternCaribbean = "east_caribbean_dollar";
    case CaymanIslands = "cayman_islands_dollar";
    case Bermuda = "bermudian_dollar";
    case Albania = "albanian_lek";
    case Armenia = "armenian_dram";
    case Azerbaijan = "azerbaijani_manat";
    case Bahrain = "bahraini_dinar";
    case Bangladesh = "bangladeshi_taka";
    case Belarus = "belarusian_ruble";
    case BosniaAndHerzegovina = "bosnian_convertible_mark";
    case Botswana = "botswana_pula";
    case Brunei = "brunei_dollar";
    case Cambodia = "cambodian_riel";
    case CaboVerde = "cape_verdean_escudo";
    case CentralAfricanRepublic = "central_african_cfa_franc";
    case WestAfrica = "west_african_cfa_franc";
    case PacificFranc = "cfp_franc";
    case Comoros = "comorian_franc";
    case Congo = "congolese_franc";
    case Djibouti = "djiboutian_franc";
    case Egypt = "egyptian_pound";
    case Eritrea = "eritrean_nakfa";
    case Estonia = "estonian_kroon";
    case Ethiopia = "ethiopian_birr";
    case Fiji = "fijian_dollar";
    case Gambia = "gambian_dalasi";
    case Georgia = "georgian_lari";
    case Ghana = "ghanaian_cedi";
    case Guinea = "guinean_franc";
    case Guyana = "guyanese_dollar";
    case Iran = "iranian_rial";
    case Iraq = "iraqi_dinar";
    case Jordan = "jordanian_dinar";
    case Kazakhstan = "kazakhstani_tenge";
    case Kenya = "kenyan_shilling";
    case Kuwait = "kuwaiti_dinar";
    case Kyrgyzstan = "kyrgyzstani_som";
    case Laos = "laotian_kip";
    case Latvia = "latvian_lats";
    case Lebanon = "lebanese_pound";
    case Lesotho = "lesotho_loti";
    case Liberia = "liberian_dollar";
    case Libya = "libyan_dinar";
    case Lithuania = "lithuanian_litas";
    case Macao = "macanese_pataca";
    case NorthMacedonia = "macedonian_denar";
    case Madagascar = "malagasy_ariary";
    case Malawi = "malawian_kwacha";
    case Maldives = "maldivian_rufiyaa";
    case Mauritania = "mauritanian_ouguiya";
    case Mauritius = "mauritian_rupee";
    case Moldova = "moldovan_leu";
    case Mongolia = "mongolian_tugrik";
    case Morocco = "moroccan_dirham";
    case Mozambique = "mozambican_metical";
    case Myanmar = "myanmar_kyat";
    case Namibia = "namibian_dollar";
    case Nepal = "nepalese_rupee";
    case Nigeria = "nigerian_naira";
    case NorthKorea = "north_korean_won";
    case Oman = "omani_rial";
    case Pakistan = "pakistani_rupee";
    case PapuaNewGuinea = "papua_new_guinean_kina";
    case Qatar = "qatari_riyal";
    case SaudiArabia = "saudi_riyal";
    case Serbia = "serbian_dinar";
    case Seychelles = "seychellois_rupee";
    case SierraLeone = "sierra_leonean_leone";
    case SolomonIslands = "solomon_islands_dollar";
    case Somalia = "somali_shilling";
    case SriLanka = "sri_lankan_rupee";
    case Sudan = "sudanese_pound";
    case Suriname = "surinamese_dollar";
    case Eswatini = "swazi_lilangeni";
    case Syria = "syrian_pound";
    case Tajikistan = "tajikistani_somoni";
    case Tanzania = "tanzanian_shilling";
    case Tonga = "tongan_paanga";
    case Tunisia = "tunisian_dinar";
    case Turkmenistan = "turkmenistani_manat";
    case Uganda = "ugandan_shilling";
    case Ukraine = "ukrainian_hryvnia";
    case Uzbekistan = "uzbekistani_som";
    case Vanuatu = "vanuatu_vatu";
    case Vietnam = "vietnamese_dong";
    case Yemen = "yemeni_rial";
    case Zambia = "zambian_kwacha";
    case Zimbabwe = "zimbabwean_dollar";
    case Afghanistan = "afghan_afghani";
    case Angola = "angolan_kwanza";
    case Burundi = "burundian_franc";
    case Chad = "chadian_franc";
    case EquatorialGuinea = "equatorial_guinean_franc";
    case Gabon = "gabonese_franc";
    case Rwanda = "rwandan_franc";
    case SaoTomeAndPrincipe = "sao_tomean_dobra";
    case Senegal = "senegalese_franc";
    case Togo = "togolese_franc";
    case BurkinaFaso = "burkinabe_franc";
    case Benin = "beninese_franc";
    case CoteDivoire = "ivorian_franc";
    case Mali = "malian_franc";
    case Niger = "nigerian_franc";

    public function code(): string
    {
        return match ($this) {
            self::UnitedStates => "USD",
            self::Eurozone => "EUR",
            self::Japan => "JPY",
            self::UnitedKingdom => "GBP",
            self::Australia => "AUD",
            self::Canada => "CAD",
            self::Switzerland => "CHF",
            self::China => "CNY",
            self::Sweden => "SEK",
            self::NewZealand => "NZD",
            self::Mexico => "MXN",
            self::Singapore => "SGD",
            self::HongKong => "HKD",
            self::Norway => "NOK",
            self::SouthKorea => "KRW",
            self::Turkey => "TRY",
            self::Russia => "RUB",
            self::India => "INR",
            self::Brazil => "BRL",
            self::SouthAfrica => "ZAR",
            self::Poland => "PLN",
            self::Thailand => "THB",
            self::Israel => "ILS",
            self::Chile => "CLP",
            self::Philippines => "PHP",
            self::UnitedArabEmirates => "AED",
            self::Czechia => "CZK",
            self::Indonesia => "IDR",
            self::Malaysia => "MYR",
            self::Hungary => "HUF",
            self::Iceland => "ISK",
            self::Croatia => "HRK",
            self::Bulgaria => "BGN",
            self::Romania => "RON",
            self::Denmark => "DKK",
            self::Argentina => "ARS",
            self::Colombia => "COP",
            self::Peru => "PEN",
            self::Uruguay => "UYU",
            self::Paraguay => "PYG",
            self::Bolivia => "BOB",
            self::Venezuela => "VES",
            self::Ecuador => "ECS",
            self::Guatemala => "GTQ",
            self::CostaRica => "CRC",
            self::Panama => "PAB",
            self::Nicaragua => "NIO",
            self::Honduras => "HNL",
            self::ElSalvador => "SVC",
            self::Belize => "BZD",
            self::Jamaica => "JMD",
            self::TrinidadAndTobago => "TTD",
            self::Barbados => "BBD",
            self::Bahamas => "BSD",
            self::Cuba => "CUP",
            self::DominicanRepublic => "DOP",
            self::Haiti => "HTG",
            self::EasternCaribbean => "XCD",
            self::CaymanIslands => "KYD",
            self::Bermuda => "BMD",
            self::Albania => "ALL",
            self::Armenia => "AMD",
            self::Azerbaijan => "AZN",
            self::Bahrain => "BHD",
            self::Bangladesh => "BDT",
            self::Belarus => "BYN",
            self::BosniaAndHerzegovina => "BAM",
            self::Botswana => "BWP",
            self::Brunei => "BND",
            self::Cambodia => "KHR",
            self::CaboVerde => "CVE",
            self::CentralAfricanRepublic, self::Gabon, self::EquatorialGuinea, self::Chad => "XAF",
            self::WestAfrica, self::Niger, self::Mali, self::Benin, self::BurkinaFaso, self::Togo, self::Senegal, self::CoteDivoire => "XOF",
            self::PacificFranc => "XPF",
            self::Comoros => "KMF",
            self::Congo => "CDF",
            self::Djibouti => "DJF",
            self::Egypt => "EGP",
            self::Eritrea => "ERN",
            self::Estonia => "EEK",
            self::Ethiopia => "ETB",
            self::Fiji => "FJD",
            self::Gambia => "GMD",
            self::Georgia => "GEL",
            self::Ghana => "GHS",
            self::Guinea => "GNF",
            self::Guyana => "GYD",
            self::Iran => "IRR",
            self::Iraq => "IQD",
            self::Jordan => "JOD",
            self::Kazakhstan => "KZT",
            self::Kenya => "KES",
            self::Kuwait => "KWD",
            self::Kyrgyzstan => "KGS",
            self::Laos => "LAK",
            self::Latvia => "LVL",
            self::Lebanon => "LBP",
            self::Lesotho => "LSL",
            self::Liberia => "LRD",
            self::Libya => "LYD",
            self::Lithuania => "LTL",
            self::Macao => "MOP",
            self::NorthMacedonia => "MKD",
            self::Madagascar => "MGA",
            self::Malawi => "MWK",
            self::Maldives => "MVR",
            self::Mauritania => "MRU",
            self::Mauritius => "MUR",
            self::Moldova => "MDL",
            self::Mongolia => "MNT",
            self::Morocco => "MAD",
            self::Mozambique => "MZN",
            self::Myanmar => "MMK",
            self::Namibia => "NAD",
            self::Nepal => "NPR",
            self::Nigeria => "NGN",
            self::NorthKorea => "KPW",
            self::Oman => "OMR",
            self::Pakistan => "PKR",
            self::PapuaNewGuinea => "PGK",
            self::Qatar => "QAR",
            self::SaudiArabia => "SAR",
            self::Serbia => "RSD",
            self::Seychelles => "SCR",
            self::SierraLeone => "SLL",
            self::SolomonIslands => "SBD",
            self::Somalia => "SOS",
            self::SriLanka => "LKR",
            self::Sudan => "SDG",
            self::Suriname => "SRD",
            self::Eswatini => "SZL",
            self::Syria => "SYP",
            self::Tajikistan => "TJS",
            self::Tanzania => "TZS",
            self::Tonga => "TOP",
            self::Tunisia => "TND",
            self::Turkmenistan => "TMT",
            self::Uganda => "UGX",
            self::Ukraine => "UAH",
            self::Uzbekistan => "UZS",
            self::Vanuatu => "VUV",
            self::Vietnam => "VND",
            self::Yemen => "YER",
            self::Zambia => "ZMW",
            self::Zimbabwe => "ZWL",
            self::Afghanistan => "AFN",
            self::Angola => "AOA",
            self::Burundi => "BIF",
            self::Rwanda => "RWF",
            self::SaoTomeAndPrincipe => "STN",
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::UnitedStates, self::Mexico, self::Argentina, self::Colombia, self::Chile, self::Cuba => '$',
            self::Eurozone => "€",
            self::Japan, self::China => "¥",
            self::UnitedKingdom => "£",
            self::Australia => 'A$',
            self::Canada, self::Nicaragua => 'C$',
            self::Switzerland => "CHF",
            self::Sweden, self::Norway, self::Iceland, self::Denmark => "kr",
            self::NewZealand => 'NZ$',
            self::Singapore => 'S$',
            self::HongKong => 'HK$',
            self::SouthKorea => "₩",
            self::Turkey => "₺",
            self::Russia => "₽",
            self::India => "₹",
            self::Brazil => 'R$',
            self::SouthAfrica => "R",
            self::Poland => "zł",
            self::Thailand => "฿",
            self::Israel => "₪",
            self::Philippines => "₱",
            self::UnitedArabEmirates => "د.إ",
            self::Czechia => "Kč",
            self::Indonesia => "Rp",
            self::Malaysia => "RM",
            self::Hungary => "Ft",
            self::Croatia => "kn",
            self::Bulgaria => "лв",
            self::Romania => "lei",
            self::Peru => "S/",
            self::Uruguay => '$U',
            self::Paraguay => "₲",
            self::Bolivia => "Bs",
            self::Venezuela => "Bs.S",
            self::Ecuador => "S/.",
            self::Guatemala => "Q",
            self::CostaRica, self::ElSalvador => "₡",
            self::Panama => "B/.",
            self::Honduras => "L",
            self::Belize => 'BZ$',
            self::Jamaica => 'J$',
            self::TrinidadAndTobago => 'TT$',
            self::Barbados => 'Bds$',
            self::Bahamas => 'B$',
            self::DominicanRepublic => 'RD$',
            self::Haiti => "G",
            self::EasternCaribbean => 'EC$',
            self::CaymanIslands => 'CI$',
            self::Bermuda => 'BD$',
            default => $this->code(),
        };
    }

    public function local(): string
    {
        return match ($this) {
            self::UnitedStates, self::Australia, self::Canada, self::NewZealand, self::Singapore, self::HongKong, self::Belize, self::Jamaica, self::TrinidadAndTobago, self::Barbados, self::Bahamas, self::EasternCaribbean, self::CaymanIslands, self::Bermuda, self::Brunei, self::Fiji, self::Guyana, self::Liberia, self::Namibia, self::SolomonIslands, self::Suriname, self::Zimbabwe => "dollar",
            self::Eurozone => "euro",
            self::Japan => "yen",
            self::UnitedKingdom, self::Egypt, self::Lebanon, self::Sudan, self::Syria => "pound",
            self::Switzerland, self::CentralAfricanRepublic, self::WestAfrica, self::PacificFranc, self::Comoros, self::Congo, self::Djibouti, self::Guinea, self::Burundi, self::Chad, self::EquatorialGuinea, self::Gabon, self::Rwanda, self::Senegal, self::Togo, self::BurkinaFaso, self::Benin, self::CoteDivoire, self::Mali, self::Niger => "franc",
            self::China => "yuan",
            self::Sweden, self::Iceland => "krona",
            self::Mexico, self::Chile, self::Philippines, self::Argentina, self::Colombia, self::Uruguay, self::Cuba, self::DominicanRepublic => "peso",
            self::Norway, self::Denmark => "krone",
            self::SouthKorea, self::NorthKorea => "won",
            self::Turkey => "lira",
            self::Russia, self::Belarus => "ruble",
            self::India, self::Mauritius, self::Nepal, self::Pakistan, self::Seychelles, self::SriLanka => "rupee",
            self::Brazil => "real",
            self::SouthAfrica => "rand",
            self::Poland => "zloty",
            self::Thailand => "baht",
            self::Israel => "shekel",
            self::UnitedArabEmirates => "diagram",
            self::Czechia => "koruna",
            self::Indonesia => "rupiah",
            self::Malaysia => "ringgit",
            self::Hungary => "forint",
            self::Croatia => "kuna",
            self::Bulgaria => "lev",
            self::Romania, self::Moldova => "leu",
            self::Peru => "sol",
            self::Paraguay => "guarani",
            self::Bolivia => "boliviano",
            self::Venezuela => "bolivar",
            self::Ecuador => "sucre",
            self::Guatemala => "quetzal",
            self::CostaRica, self::ElSalvador => "colon",
            self::Panama => "balboa",
            self::Nicaragua => "cordoba",
            self::Honduras => "lempira",
            self::Haiti => "gourde",
            self::Albania => "lek",
            self::Armenia => "dram",
            self::Azerbaijan, self::Turkmenistan => "manat",
            self::Bahrain, self::Iraq, self::Jordan, self::Kuwait, self::Libya, self::Serbia, self::Tunisia => "dinar",
            self::Bangladesh => "taka",
            self::BosniaAndHerzegovina => "mark",
            self::Botswana => "pula",
            self::Cambodia => "riel",
            self::CaboVerde => "escudo",
            self::Eritrea => "nakfa",
            self::Estonia => "kroon",
            self::Ethiopia => "birr",
            self::Gambia => "dalasi",
            self::Georgia => "lari",
            self::Ghana => "cedi",
            self::Iran, self::Oman, self::Yemen => "rial",
            self::Kazakhstan => "tenge",
            self::Kenya, self::Somalia, self::Tanzania, self::Uganda => "shilling",
            self::Kyrgyzstan, self::Uzbekistan => "som",
            self::Laos => "kip",
            self::Latvia => "lats",
            self::Lesotho => "loti",
            self::Lithuania => "litas",
            self::Macao => "pataca",
            self::NorthMacedonia => "denar",
            self::Madagascar => "ariary",
            self::Malawi, self::Zambia => "kwacha",
            self::Maldives => "rufiyaa",
            self::Mauritania => "ouguiya",
            self::Mongolia => "tugrik",
            self::Morocco => "dirham",
            self::Mozambique => "metical",
            self::Myanmar => "kyat",
            self::Nigeria => "naira",
            self::PapuaNewGuinea => "kina",
            self::Qatar, self::SaudiArabia => "riyal",
            self::SierraLeone => "leone",
            self::Eswatini => "lilangeni",
            self::Tajikistan => "somoni",
            self::Tonga => "paanga",
            self::Ukraine => "hryvnia",
            self::Vanuatu => "vatu",
            self::Vietnam => "dong",
            self::Afghanistan => "afghani",
            self::Angola => "kwanza",
            self::SaoTomeAndPrincipe => "dobra",
        };
    }

    public function __call(string $name, array $arguments): mixed
    {
        return match ($name) {
            "format" => $this->formatCurrency(...$arguments),
            default => throw new \BadMethodCallException("Method {$name} does not exist on Currency enum"),
        };
    }

    public static function __callStatic(string $name, array $arguments): mixed
    {
        return match ($name) {
            "format" => self::formatGeneric(...$arguments),
            default => throw new BadMethodCallException("Static method {$name} does not exist on Currency enum"),
        };
    }

    private function formatCurrency(int $amount, int $precision = 2): string
    {
        $symbol = $this->symbol();
        $formattedAmount = number_format($amount, $precision);

        return "{$symbol}{$formattedAmount}";
    }

    private static function formatGeneric(int $amount, string $symbol = "$", int $precision = 2, string $decimals = ".", string $thousands = ","): string
    {
        $formattedAmount = number_format($amount, $precision, $decimals, $thousands);
        return "{$symbol}{$formattedAmount}";
    }
}