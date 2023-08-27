<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Data;

class FilterDataTableData extends Data
{
	public function __construct(
		public int $start,
		public int $length,
		public string $field,
		public string $sort,
		public ?string $search,
		public ?string $searchCol
	)
	{
	}
}
