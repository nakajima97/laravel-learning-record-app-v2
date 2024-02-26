<?php

namespace App\UseCases\RecordMonthly;

use App\Models\Record;

class FetchRecordMonthlyPaginate
{
  /**
   * 月ごとの総学習時間をページネーション付きで取得する
   * 
   * @param int $user_id
   * @param int $paginate_num Optional
   */
  public function __invoke($user_id, $paginate_num = 10)
  {
    $monthly_record = Record::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(minute) as total_time')
      ->where('user_id', $user_id)
      ->groupBy('month')
      ->paginate($paginate_num);

    return $monthly_record;
  }
}