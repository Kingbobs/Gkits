<?php
namespace vale\commands;
use pocketmine\block\Diamond;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\network\mcpe\protocol\ResourcePackStackPacket;
use pocketmine\utils\MainLogger;
use pocketmine\utils\TextFormat;
use vale\api\ApiManager;
use vale\Gkits;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\entity\Skin;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\tile\Chest;
use pocketmine\tile\Tile;
use pocketmine\item\ItemIds;
use pocketmine\network\mcpe\protocol\types\WindowTypes;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\inventory\transaction\action\InventoryAction;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\nbt\tag\IntTag;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use muqsit\invmenu\inventories\BaseFakeInventory;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

class PreviewCommand extends PluginCommand
{




private $main;

public function __construct(Gkits $main)
{
$this->main = $main;
parent::__construct("preview", $main);

}

public function execute(CommandSender $sender, string $commandLabel, array $args)
{
if (!$sender instanceof Player) {
MainLogger::getLogger()->alert("Only Players Can USE THIS");
return false;
} else {
if ($sender instanceof Player) {
if (!isset($args[0])) {
$sender->sendMessage("§r§7Usage: §r§d/preview help");

return false;
}


if (isset($args[0])) {
switch ($args[0]) {

case "butcher":
$diamond = Item::get(264);
$diamond->setCustomName("Butcher");

$menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
$menu->readonly();
$menu->setName("§cTEST");
$menu->setListener([$this, "handleWarpMenu"]);
$inventory = $menu->getInventory();
$inventory->setItem(0,$diamond);

$menu->send($sender);
break;


case "help":
    $sender->sendMessage("Avaliable gkits");
    $sender->sendMessage("/preview butcher");


}
}
}

}
return true;
}




public function handleWarpMenu(Player $player, Item $itemClicked, Item $itemClickedWith, SlotChangeAction $action): bool{


if($itemClicked->getId() === Item::DIAMOND and $itemClicked->getCustomName() === "Butcher") {
$level = $player->getLevel();
$this->MC($player);
$player->sendMessage(TextFormat::RED . "test");


}
return true;
}

    public function MC($player)
    {
        $this->inventory = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
        $this->inventory->readonly();

        $inv = $this->inventory->getInventory();
        $item1  = Item::get(276,0,1);
        $itemname = Gkits::getInstance()->getConfig()->get("ButcherSwordName");
        $item1->setCustomName($itemname);
        $ench1 = Gkits::getInstance()->getConfig()->get("Enchant1");
        $ench1level = Gkits::getInstance()->getConfig()->get("Enchant1Level");
        $ench2 = Gkits::getInstance()->getConfig()->get("Enchant2");
        $ench2level = Gkits::getInstance()->getConfig()->get("Enchant2Level");
        $ce1 = Gkits::getInstance()->getConfig()->get("CE1");
        $ce1level = Gkits::getInstance()->getConfig()->get("CE1Level");
        $ce2 = Gkits::getInstance()->getConfig()->get("CE2");
        $ce2level = Gkits::getInstance()->getConfig()->get("CE2Level");
        $ce3 = Gkits::getInstance()->getConfig()->get("CE3");
        $ce3level = Gkits::getInstance()->getConfig()->get("CE3Level");
        $ce4 = Gkits::getInstance()->getConfig()->get("CE4");
        $ce4level = Gkits::getInstance()->getConfig()->get("CE4Level");
        $ce5 = Gkits::getInstance()->getConfig()->get("CE5");
        $ce5level = Gkits::getInstance()->getConfig()->get("CE5Level");
        $ce6 = Gkits::getInstance()->getConfig()->get("CE6");
        $ce6level = Gkits::getInstance()->getConfig()->get("CE6Level");
        $ce7 = Gkits::getInstance()->getConfig()->get("CE7");
        $ce7level = Gkits::getInstance()->getConfig()->get("CE7Level");
        ApiManager::addEnchantments($item1,Enchantment::getEnchantmentByName($ench1),$ench1level);
        ApiManager::addEnchantments($item1,Enchantment::getEnchantmentByName($ench2),$ench2level);
        ApiManager::addCustomEnchants($item1,$ce1,$ce1level);
        ApiManager::addCustomEnchants($item1,$ce2,$ce2level);
        ApiManager::addCustomEnchants($item1,$ce3,$ce3level);
        ApiManager::addCustomEnchants($item1,$ce4,$ce4level);
        ApiManager::addCustomEnchants($item1,$ce5,$ce5level);
        ApiManager::addCustomEnchants($item1,$ce6,$ce6level);
        ApiManager::addCustomEnchants($item1,$ce7,$ce7level);


                $item2  = Item::get(310,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherHelmetName");
                $item2->setCustomName($itemname);
                $ench3 = Gkits::getInstance()->getConfig()->get("HelmetEnchant1");
                $ench3level = Gkits::getInstance()->getConfig()->get("HelmetEnchant1Level");
                $ench4 = Gkits::getInstance()->getConfig()->get("HelmetEnchant2");
                $ench4level = Gkits::getInstance()->getConfig()->get("HelmetEnchant2Level");
                $ce1 = Gkits::getInstance()->getConfig()->get("HelmetCE1");
                $ce1level = Gkits::getInstance()->getConfig()->get("HelmetCE1Level");
                $ce2 = Gkits::getInstance()->getConfig()->get("HelmetCE2");
                $ce2level = Gkits::getInstance()->getConfig()->get("HelmetCE2Level");
                $ce3 = Gkits::getInstance()->getConfig()->get("HelmetCE3");
                $ce3level = Gkits::getInstance()->getConfig()->get("HelmetCE3Level");
                $ce4 = Gkits::getInstance()->getConfig()->get("HelmetCE4");
                $ce4level = Gkits::getInstance()->getConfig()->get("HelmetCE4Level");
                $ce5 = Gkits::getInstance()->getConfig()->get("HelmetCE5");
                $ce5level = Gkits::getInstance()->getConfig()->get("HelmetCE5Level");
                $ce6 = Gkits::getInstance()->getConfig()->get("HelmetCE6");
                $ce6level = Gkits::getInstance()->getConfig()->get("HelmetCE6Level");
                $ce7 = Gkits::getInstance()->getConfig()->get("HelmetCE7");
                $ce7level = Gkits::getInstance()->getConfig()->get("HelmetCE7Level");
        ApiManager::addEnchantments($item2,Enchantment::getEnchantmentByName($ench3),$ench3level);
        ApiManager::addEnchantments($item2,Enchantment::getEnchantmentByName($ench4),$ench4level);
        ApiManager::addCustomEnchants($item2,$ce1,$ce1level);
        ApiManager::addCustomEnchants($item2,$ce2,$ce2level);
        ApiManager::addCustomEnchants($item2,$ce3,$ce3level);
        ApiManager::addCustomEnchants($item2,$ce4,$ce4level);
        ApiManager::addCustomEnchants($item2,$ce5,$ce5level);
        ApiManager::addCustomEnchants($item2,$ce6,$ce6level);
        ApiManager::addCustomEnchants($item2,$ce7,$ce7level);
                







                $item3  = Item::get(311,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherChestPlateName");
                $item3->setCustomName($itemname);
                $e1 = Gkits::getInstance()->getConfig()->get("ChestPlateEnchant1");
                $e11 = Gkits::getInstance()->getConfig()->get("ChestPlateEnchant1Level");
                $ench4 = Gkits::getInstance()->getConfig()->get("ChestPlateEnchant2");
                $ench4level = Gkits::getInstance()->getConfig()->get("ChestPlateEnchant2Level");
                $ce1 = Gkits::getInstance()->getConfig()->get("ChestPlateCE1");
                $ce1level = Gkits::getInstance()->getConfig()->get("ChestPlateCE1Level");
                $ce2 = Gkits::getInstance()->getConfig()->get("ChestPlateCE2");
                $ce2level = Gkits::getInstance()->getConfig()->get("ChestPlateCE2Level");
                $ce3 = Gkits::getInstance()->getConfig()->get("ChestPlateCE3");
                $ce3level = Gkits::getInstance()->getConfig()->get("ChestPlateCE3Level");
                $ce4 = Gkits::getInstance()->getConfig()->get("ChestPlateCE4");
                $ce4level = Gkits::getInstance()->getConfig()->get("ChestPlateCE4Level");
                $ce5 = Gkits::getInstance()->getConfig()->get("ChestPlateCE5");
                $ce5level = Gkits::getInstance()->getConfig()->get("ChestPlateCE5Level");
                $ce6 = Gkits::getInstance()->getConfig()->get("ChestPlateCE6");
                $ce6level = Gkits::getInstance()->getConfig()->get("ChestPlateCE6Level");
                $ce7 = Gkits::getInstance()->getConfig()->get("ChestPlateCE7");
                $ce7level = Gkits::getInstance()->getConfig()->get("ChestPlateCE7Level");
        ApiManager::addEnchantments($item3,Enchantment::getEnchantmentByName($e1),$e11);
        ApiManager::addEnchantments($item3,Enchantment::getEnchantmentByName($ench4),$ench4level);
                ApiManager::addCustomEnchants($item3,$ce1,$ce1level);
        ApiManager::addCustomEnchants($item3,$ce2,$ce2level);
        ApiManager::addCustomEnchants($item3,$ce3,$ce3level);
        ApiManager::addCustomEnchants($item3,$ce4,$ce4level);
        ApiManager::addCustomEnchants($item3,$ce5,$ce5level);
        ApiManager::addCustomEnchants($item3,$ce6,$ce6level);
                ApiManager::addCustomEnchants($item3,$ce7,$ce7level);
               


                $item4  = Item::get(312,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherLeggingsName");
                $item4->setCustomName($itemname);
                $e1 = Gkits::getInstance()->getConfig()->get("LeggingsEnchant1");
                $e11 = Gkits::getInstance()->getConfig()->get("LeggingsEnchant1Level");
                $ench4 = Gkits::getInstance()->getConfig()->get("LeggingsEnchant2");
                $ench4level = Gkits::getInstance()->getConfig()->get("LeggingsEnchant2Level");
                $ce1 = Gkits::getInstance()->getConfig()->get("LeggingsCE1");
                $ce1level = Gkits::getInstance()->getConfig()->get("LeggingsCE1Level");
                $ce2 = Gkits::getInstance()->getConfig()->get("LeggingsCE2");
                $ce2level = Gkits::getInstance()->getConfig()->get("LeggingsCE2Level");
                $ce3 = Gkits::getInstance()->getConfig()->get("LeggingsCE3");
                $ce3level = Gkits::getInstance()->getConfig()->get("LeggingsCE3Level");
                $ce4 = Gkits::getInstance()->getConfig()->get("LeggingsCE4");
                $ce4level = Gkits::getInstance()->getConfig()->get("LeggingsCE4Level");
                $ce5 = Gkits::getInstance()->getConfig()->get("LeggingsCE5");
                $ce5level = Gkits::getInstance()->getConfig()->get("LeggingsCE5Level");
                $ce6 = Gkits::getInstance()->getConfig()->get("LeggingsCE6");
                $ce6level = Gkits::getInstance()->getConfig()->get("LeggingsCE6Level");
                $ce7 = Gkits::getInstance()->getConfig()->get("LeggingsCE7");
                $ce7level = Gkits::getInstance()->getConfig()->get("LeggingsCE7Level");
        ApiManager::addEnchantments($item4,Enchantment::getEnchantmentByName($e1),$e11);
        ApiManager::addEnchantments($item4,Enchantment::getEnchantmentByName($ench4),$ench4level);
        ApiManager::addCustomEnchants($item4,$ce1,$ce1level);
        ApiManager::addCustomEnchants($item4,$ce2,$ce2level);
        ApiManager::addCustomEnchants($item4,$ce3,$ce3level);
        ApiManager::addCustomEnchants($item4,$ce4,$ce4level);
        ApiManager::addCustomEnchants($item4,$ce5,$ce5level);
        ApiManager::addCustomEnchants($item4,$ce6,$ce6level);
        ApiManager::addCustomEnchants($item4,$ce7,$ce7level);
            



                $item5  = Item::get(313,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherBootsName");
                $item5->setCustomName($itemname);
                $e1 = Gkits::getInstance()->getConfig()->get("BootsEnchant1");
                $e11 = Gkits::getInstance()->getConfig()->get("BootsEnchant1Level");
                $ench4 = Gkits::getInstance()->getConfig()->get("BootsEnchant2");
                $ench4level = Gkits::getInstance()->getConfig()->get("BootsEnchant2Level");
                $ce1 = Gkits::getInstance()->getConfig()->get("BootsCE1");
                $ce1level = Gkits::getInstance()->getConfig()->get("BootsCE1Level");
                $ce2 = Gkits::getInstance()->getConfig()->get("BootsCE2");
                $ce2level = Gkits::getInstance()->getConfig()->get("BootsCE2Level");
                $ce3 = Gkits::getInstance()->getConfig()->get("BootsCE3");
                $ce3level = Gkits::getInstance()->getConfig()->get("BootsCE3Level");
                $ce4 = Gkits::getInstance()->getConfig()->get("BootsCE4");
                $ce4level = Gkits::getInstance()->getConfig()->get("BootsCE4Level");
                $ce5 = Gkits::getInstance()->getConfig()->get("BootsCE5");
                $ce5level = Gkits::getInstance()->getConfig()->get("BootsCE5Level");
                $ce6 = Gkits::getInstance()->getConfig()->get("BootsCE6");
                $ce6level = Gkits::getInstance()->getConfig()->get("BootsCE6Level");
                $ce7 = Gkits::getInstance()->getConfig()->get("BootsCE7");
                $ce7level = Gkits::getInstance()->getConfig()->get("BootsCE7Level");
        ApiManager::addEnchantments($item5,Enchantment::getEnchantmentByName($e1),$e11);
        ApiManager::addEnchantments($item5,Enchantment::getEnchantmentByName($ench4),$ench4level);
        ApiManager::addCustomEnchants($item5,$ce1,$ce1level);
        ApiManager::addCustomEnchants($item5,$ce2,$ce2level);
        ApiManager::addCustomEnchants($item5,$ce3,$ce3level);
        ApiManager::addCustomEnchants($item5,$ce4,$ce4level);
        ApiManager::addCustomEnchants($item5,$ce5,$ce5level);
        ApiManager::addCustomEnchants($item5,$ce6,$ce6level);
        ApiManager::addCustomEnchants($item5,$ce7,$ce7level);
                




         $inv->setItem(0,$item1);
        $inv->setItem(1,$item2);
        $inv->setItem(2,$item3);
        $inv->setItem(3,$item4);
        $inv->setItem(4,$item5);

        $this->inventory->send($player);

    }

}
