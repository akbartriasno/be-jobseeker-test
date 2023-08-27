<?php

namespace App\DataTransferObject;

use App\Enums\GenderSource;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CandidateData extends Data
{
	public function __construct(
		public ?string $id,

		#[Required]
		public string $full_name,

		public string $email,

		public string $phone_number,

		#[Required]
		public string $dob,

		#[Required]
		public string $pob,

		#[Enum(GenderSource::class)]
		public string $gender,
		
		public ?string $year_exp,
		public ?string $last_salary
	) {
	}
	
	public static function rules(): array
	{
		return [
			'email' => ['required', 'string', 'email', 'unique:t_candidates,email,' .request()->get('id')],
			'phone_number' => ['unique:t_candidates,phone_number,' .request()->get('id')],
		];
	}
}
