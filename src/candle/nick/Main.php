<?php

namespace candle\nick;

use candle\nick\Commands\NickCommand;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use candle\mask\Listener\PlayerMask;
use pocketmine\scheduler\ClosureTask;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Nick been enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
 
        $this->registerCommands();
    }

    public function registerCommands()
    {
        $this->getServer()->getCommandMap()->register('nick', new NickCommand());
    }
}
