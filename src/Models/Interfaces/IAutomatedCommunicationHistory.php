<?php

namespace YouNegotiate\Models\Interfaces;

use App\Models\Company;
use App\Models\Consumer;
use App\Models\Group;
use App\Models\Template;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $auto_camp_id
 * @property int|null $company_id
 * @property int|null $consumer_id
 * @property int|null $sub_client1_id
 * @property int|null $sub_client2_id
 * @property int|null $email_temp_id
 * @property int|null $sms_temp_id
 * @property string|null $template_type
 * @property string|null $phone
 * @property string|null $email
 * @property int $smssegment
 * @property string|null $status
 * @property string|null $subject
 * @property string|null $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 * @property-read Consumer|null $consumer
 * @property-read Group|null $group
 * @property-read Template|null $template
 */

interface IAutomatedCommunicationHistory
{
}