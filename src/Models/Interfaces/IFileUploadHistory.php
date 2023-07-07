<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\FailedFileUploadConsumer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $company_id
 * @property int|null $subclient_id
 * @property string|null $filename
 * @property string|null $uploaded_by
 * @property string|null $type
 * @property string|null $num_of_records
 * @property int $processed_count
 * @property int $failed_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $status
 * @property string|null $failed_list
 * @property int|null $cancel_transaction
 * @property int|null $cfpb_communication
 * @property int|null $created_by
 * @property-read Collection<int, FailedFileUploadConsumer> $failed_consumers
 * @property-read int|null $failed_consumers_count
 */

interface IFileUploadHistory
{
}