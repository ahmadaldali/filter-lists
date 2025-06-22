<?php

namespace AhmadAldali\FilterLists\Traits;

use Carbon\Carbon;

trait FixedRangeFilter
{
    /**
     * Get the date range for a fixed period: today, monthly, or yearly.
     *
     * @param string $value
     * @return array{from: string, to: string}
     */
    public function getDateRangeForPeriod(string $value): array
    {
        $today = Carbon::now();

        switch ($value) {
            case 'today':
                $from = $today->copy()->startOfDay();
                $to = $today->copy()->endOfDay();
                break;

            case 'monthly':
                $from = $today->copy()->startOfMonth()->startOfDay();
                $to = $today->copy()->endOfMonth()->endOfDay();
                break;

            case 'yearly':
            default:
                $from = $today->copy()->startOfYear()->startOfDay();
                $to = $today->copy()->endOfYear()->endOfDay();
                break;
        }

        return [
            'from' => $from->format('Y-m-d H:i:s'),
            'to' => $to->format('Y-m-d H:i:s'),
        ];
    }
}
