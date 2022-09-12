<?php

namespace candle\nick\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class NickCommand extends Command
{
    public function __construct()
    {
        parent::__construct('nick', '/nick', '', ['n', 'disguise']);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if (!$sender->hasPermission('nick.command')) {
                $sender->sendMessage('You dont have permissions to execute command.');
            }
            if (!$args[0]) {
                $sender->sendMessage('Provide a NickName');
            }
            $sender->setDisplayName($args[0]);
            $sender->sendMessage(TextFormat::GREEN . 'You have changed your Nick to: ' . TextFormat::AQUA . $args[0]);
        }
    }
}
