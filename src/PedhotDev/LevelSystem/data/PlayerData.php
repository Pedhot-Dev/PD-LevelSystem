<?php

declare(strict_types=1);

namespace PedhotDev\LevelSystem\data;

use pocketmine\player\Player;
use function strtolower;

class PlayerData
{

	private array $allData;

	public function __construct(array $allData)
	{
		$this->allData = $allData;
	}

    public function addPlayer(Player|string $player, $defaultValue = 0) : bool {
        if ($player instanceof Player) {
            $player = $player->getName();
        }
        $player = strtolower($player);
        if ($this->isPlayerExist($player)) return false;
        $this->allData[$player] = $defaultValue;
        return true;
    }

	public function getExp(Player|string $player, int $default = 0) : int {
		if ($player instanceof Player) {
			$player = $player->getName();
		}
		$player = strtolower($player);
		return $this->isPlayerExist($player) ? (int) $this->allData[$player] : $default;
	}

	public function setExp(Player|string $player, int $value) : bool {
		if ($player instanceof Player) {
			$player = $player->getName();
		}
		$player = strtolower($player);
		if (!$this->isPlayerExist($player)) return false;
		$this->allData[$player] = $value;
		return true;
	}

	public function increaseExp(Player|string $player, int $value = 1) : bool {
		if ($player instanceof Player) {
			$player = $player->getName();
		}
		$player = strtolower($player);
		if (!$this->isPlayerExist($player)) return false;
		$this->allData[$player] += $value;
		return true;
	}

	public function decreaseExp(Player|string $player, int $value = 1) : bool {
		if ($player instanceof Player) {
			$player = $player->getName();
		}
		$player = strtolower($player);
		if (!$this->isPlayerExist($player)) return false;
		$this->allData[$player] -= $value;
		return true;
	}

	public function isPlayerExist(Player|string $player) : bool {
		if ($player instanceof Player) {
			$player = $player->getName();
		}
		$player = strtolower($player);
		return isset($this->allData[$player]);
	}

	public function getAllData() : array
	{
		return $this->allData;
	}

}
