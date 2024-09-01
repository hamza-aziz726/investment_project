<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    public function planName()
    {
        return $this->hasOne(InvestmentPlan::class, 'id','investment_plan_id');
    }
}
