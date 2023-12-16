<?php

namespace YouNegotiate\Models\Interfaces;

use App\Models\User;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\AutomatedCampaign;
use YouNegotiate\Models\CommunicationStatus;

/**
 * @property int $id
 * @property string $name
 * @property string|null $subject
 * @property string $created_by
 * @property string $type
 * @property string|null $content
 * @property int $enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read AutomatedCampaign|null $automatedCampaign
 * @property-read User|null $createdBy
 * @property-read CommunicationStatus|null $emailTemplate
 * @property-read CommunicationStatus|null $smsTemplate
 */
interface IAutomatedTemplate
{
}
