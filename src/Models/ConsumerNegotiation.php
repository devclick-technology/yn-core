<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use YouNegotiate\Models\Interfaces\IConsumerNegotiation;

class ConsumerNegotiation extends Model implements IConsumerNegotiation
{
    use HasFactory;

    protected $fillable = [
        'consumer_id',
        'company_id',
        'negotiation_type',
        'negotiate_amount',
        'monthly_amount',
        'no_of_installments',
        'last_month_amount',
        'installment_type',
        'first_pay_date',
        'one_time_settlement',
        'communication_type',
        'email',
        'phone',
        'reason',
        'note',
        'active_negotiation',
        'counter_monthly_amount',
        'counter_one_time_amount',
        'counter_first_pay_date',
        'counter_negotiate_amount',
        'offer_accepted',
        'counter_offer_accepted',
        'approved_by',
    ];

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function scheduleTransactions(): HasMany
    {
        return $this->hasMany(ScheduleTransaction::class, 'consumer_id', 'consumer_id');
    }
}
