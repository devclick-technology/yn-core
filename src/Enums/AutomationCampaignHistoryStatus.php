<?php

namespace YouNegotiate\Enums;

enum AutomationCampaignHistoryStatus: int
{
    case SUCCESS = 1;
    case FAILED = 2;
    case IN_PROGRESS = 3;
}
