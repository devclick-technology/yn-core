<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum State: string
{
    use Names;
    use SelectionBox;
    use Values;

    case ALABAMA = 'AL';
    case ALASKA = 'AK';
    case ARIZONA = 'AZ';
    case ARKANSAS = 'AR';
    case CALIFORNIA = 'CA';
    case COLORADO = 'CO';
    case CONNECTICUT = 'CT';
    case DELAWARE = 'DE';
    case DISTRICT_OF_COLUMBIA = 'DC';
    case FLORIDA = 'FL';
    case GEORGIA = 'GA';
    case HAWAII = 'HI';
    case IDAHO = 'ID';
    case ILLINOIS = 'IL';
    case INDIANA = 'IN';
    case IOWA = 'IA';
    case KANSAS = 'KS';
    case KENTUCKY = 'KY';
    case LOUISIANA = 'LA';
    case MAINE = 'ME';
    case MARYLAND = 'MD';
    case MASSACHUSETTS = 'MA';
    case MICHIGAN = 'MI';
    case MINNESOTA = 'MN';
    case MISSISSIPPI = 'MS';
    case MISSOURI = 'MO';
    case MONTANA = 'MT';
    case NEBRASKA = 'NE';
    case NEVADA = 'NV';
    case NEW_HAMPSHIRE = 'NH';
    case NEW_JERSEY = 'NJ';
    case NEW_MEXICO = 'NM';
    case NEW_YORK = 'NY';
    case NORTH_CAROLINA = 'NC';
    case NORTH_DAKOTA = 'ND';
    case OHIO = 'OH';
    case OKLAHOMA = 'OK';
    case OREGON = 'OR';
    case PENNSYLVANIA = 'PA';
    case PUERTO_RICO = 'PR';
    case RHODE_ISLAND = 'RI';
    case SOUTH_CAROLINA = 'SC';
    case SOUTH_DAKOTA = 'SD';
    case TENNESSEE = 'TN';
    case TEXAS = 'TX';
    case UTAH = 'UT';
    case VERMONT = 'VT';
    case VIRGINIA = 'VA';
    case WASHINGTON = 'WA';
    case WEST_VIRGINIA = 'WV';
    case WISCONSIN = 'WI';
    case WYOMING = 'WY';

    /**
     * @return array<int, string>
     */
    public static function getStateForWithoutProcessingCharges(): array
    {
        return [
            self::NEW_YORK->value,
            self::MASSACHUSETTS->value,
            self::CONNECTICUT->value,
        ];
    }
}
