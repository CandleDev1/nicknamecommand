<?php

namespace candle\mask;

use candle\mask\Commands\givemask;
use candle\mask\Listener\CreeperMask;
use candle\mask\Listener\DragonMask;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use candle\mask\Listener\PlayerMask;
use pocketmine\scheduler\ClosureTask;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Masks been enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->registerMask();
        $this->registerCommands();
    }

    public function registerMask()
    {
        $this->getScheduler()->scheduleRepeatingTask(new PlayerMask(), 20);
        $this->getScheduler()->scheduleRepeatingTask(new CreeperMask(), 20);
        $this->getScheduler()->scheduleRepeatingTask(new DragonMask(), 20);
    }
    public function registerCommands()
    {
        $this->getServer()->getCommandMap()->register('givemask', new givemask());
    }
}
