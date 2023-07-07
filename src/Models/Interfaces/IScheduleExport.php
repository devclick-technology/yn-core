<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use YouNegotiate\Models\Subclient;
use App\Models\User;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $user_id
 * @property string $report_type
 * @property string $company_id
 * @property string $customer_group
 * @property string $frequency
 * @property string $delivery_type
 * @property string|null $host
 * @property string|null $username
 * @property string|null $password
 * @property string|null $keyfile
 * @property string|null $port
 * @property string|null $folder_path
 * @property string|null $email_id
 * @property int $push
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $subclient_id
 * @property int $admin
 * @property-read Company|null $company
 * @property-read Subclient|null $subclient
 * @property-read User $user
 */

interface IScheduleExport
{
}