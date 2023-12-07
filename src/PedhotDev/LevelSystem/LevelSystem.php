<?php

declare(strict_types=1);

namespace PedhotDev\LevelSystem;

use PedhotDev\LevelSystem\data\PlayerData;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class LevelSystem extends PluginBase
{
	use SingletonTrait;

	private Config $dataConfig;

	private PlayerData $playerData;

	protected function onLoad() : void
	{
		self::setInstance($this);
		$this->dataConfig = $dataConfig = new Config($this->getDataFolder() . "players.json", Config::JSON, []);
		$this->playerData = new PlayerData($dataConfig->getAll());
	}

	protected function onDisable() : void
	{
		$this->dataConfig->setAll($this->playerData->getAllData());
		$this->dataConfig->save();
	}

	public function getPlayerData() : PlayerData
	{
		return $this->playerData;
	}

}
