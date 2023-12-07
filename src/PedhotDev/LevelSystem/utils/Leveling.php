<?php

declare(strict_types=1);

namespace PedhotDev\LevelSystem\utils;

use function floor;

class Leveling
{

	public const BASE_EXP = 200;

	public static function calculateLevel(int $exp) : int {
		return floor($exp / self::BASE_EXP) + 1;
	}

	public static function calculateRemainingExp($exp) : int {
		return $exp % self::BASE_EXP;
	}

}
