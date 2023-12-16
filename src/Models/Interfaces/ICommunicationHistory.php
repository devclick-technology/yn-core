<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Consumer;
use YouNegotiate\Models\Group;
use YouNegotiate\Models\Template;

/**
 * @property int $id
 * @property string|null $company_id
 * @property string|null $consumer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $sub_client1_id
 * @property int|null $sub_client2_id
 * @property int|null $group_id
 * @property int|null $template_id
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $smssegment
 * @property string|null $status
 * @property string|null $template_type
 * @property string|null $subject
 * @property string|null $content
 * @property int|null $campaign_id
 * @property-read Company|null $company
 * @property-read Consumer|null $consumer
 * @property-read Group|null $group
 * @property-read Template|null $template
 */
interface ICommunicationHistory
{
}
