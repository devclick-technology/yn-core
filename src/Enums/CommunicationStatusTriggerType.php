<?php

namespace YouNegotiate\Enums;

enum CommunicationStatusTriggerType :int
{
    case AUTOMATIC = 1;
    case SCHEDULED = 2;
    case BOTH = 3;
}
