<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class BlogChart extends BaseChart
{
  /**
  * Handles the HTTP request for the given chart.
  * It must always return an instance of Chartisan
  * and never a string or an array.
  */
  public function handler(Request $request): Chartisan
  {
    return Chartisan::build()
    ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
    ->dataset('Total Blog', [1, 2, 3])
    ->dataset('Total Serie', [3, 2, 1]);
  }
}