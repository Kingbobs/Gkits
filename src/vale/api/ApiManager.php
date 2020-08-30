<?php


namespace vale\api;



use pocketmine\block\Diamond;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use pocketmine\utils\MainLogger;
use vale\Gkits;
use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchant;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
class ApiManager
{


    public static function addEnchantments(Item $item, Enchantment $enchantment, int $level)
    {



        $item->addEnchantment(new EnchantmentInstance(($enchantment), $level));


    }



    public static function giveRandomGkit(Player $player)
    {

        $chance = rand(1, 1);
        switch ($chance) {


            case 1:
                $item = Item::get(264, 0, 1);
                $butcheritemname = Gkits::getInstance()->getConfig()->get("ButcherItemName");
                $item->setCustomName($butcheritemname);


                $glint = Gkits::getInstance()->getConfig()->get("ButcherGlint");


                $item->setLore([
                    "§r§7Tap to use this Gkit Gem",
                ]);

                if ($glint === "true") {
                    self::addEnchantments($item, Enchantment::getEnchantmentByName("unbreaking"), 1);
                }
                if ($glint === "false") {

                    $item->removeEnchantment(34);
                }
                $player->getInventory()->addItem($item);


                break;

        }


    }

    public static function addCustomEnchants(Item $item, string $name, int $level){

        $item->addEnchantment(new EnchantmentInstance(CustomEnchantManager::getEnchantmentByName($name), $level));

    }

    public static function giveRandomGkitRewards(Player $player)
    {

        $chance = rand(1, 5);


        switch ($chance){

            case 1:
                $item  = Item::get(276,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherSwordName");
                $item->setCustomName($itemname);
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
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench1),$ench1level);
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench2),$ench2level);
                self::addCustomEnchants($item,$ce1,$ce1level);
                self::addCustomEnchants($item,$ce2,$ce2level);
                self::addCustomEnchants($item,$ce3,$ce3level);
                self::addCustomEnchants($item,$ce4,$ce4level);
                self::addCustomEnchants($item,$ce5,$ce5level);
                self::addCustomEnchants($item,$ce6,$ce6level);
                self::addCustomEnchants($item,$ce7,$ce7level);
                $player->getInventory()->addItem($item);
                break;



            case 2:
                $item  = Item::get(310,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherHelmetName");
                $item->setCustomName($itemname);
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
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench3),$ench3level);
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench4),$ench4level);
                self::addCustomEnchants($item,$ce1,$ce1level);
                self::addCustomEnchants($item,$ce2,$ce2level);
                self::addCustomEnchants($item,$ce3,$ce3level);
                self::addCustomEnchants($item,$ce4,$ce4level);
                self::addCustomEnchants($item,$ce5,$ce5level);
                self::addCustomEnchants($item,$ce6,$ce6level);
                self::addCustomEnchants($item,$ce7,$ce7level);
                $player->getInventory()->addItem($item);


                break;



            case 3:
                $item  = Item::get(311,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherChestPlateName");
                $item->setCustomName($itemname);
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
                self::addEnchantments($item,Enchantment::getEnchantmentByName($e1),$e11);
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench4),$ench4level);
                self::addCustomEnchants($item,$ce1,$ce1level);
                self::addCustomEnchants($item,$ce2,$ce2level);
                self::addCustomEnchants($item,$ce3,$ce3level);
                self::addCustomEnchants($item,$ce4,$ce4level);
                self::addCustomEnchants($item,$ce5,$ce5level);
                self::addCustomEnchants($item,$ce6,$ce6level);
                self::addCustomEnchants($item,$ce7,$ce7level);
                $player->getInventory()->addItem($item);


                break;


            case 4:
                $item  = Item::get(312,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherLeggingsName");
                $item->setCustomName($itemname);
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
                self::addEnchantments($item,Enchantment::getEnchantmentByName($e1),$e11);
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench4),$ench4level);
                self::addCustomEnchants($item,$ce1,$ce1level);
                self::addCustomEnchants($item,$ce2,$ce2level);
                self::addCustomEnchants($item,$ce3,$ce3level);
                self::addCustomEnchants($item,$ce4,$ce4level);
                self::addCustomEnchants($item,$ce5,$ce5level);
                self::addCustomEnchants($item,$ce6,$ce6level);
                self::addCustomEnchants($item,$ce7,$ce7level);
                $player->getInventory()->addItem($item);


                break;


            case 5:
                $item  = Item::get(313,0,1);
                $itemname = Gkits::getInstance()->getConfig()->get("ButcherBootsName");
                $item->setCustomName($itemname);
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
                self::addEnchantments($item,Enchantment::getEnchantmentByName($e1),$e11);
                self::addEnchantments($item,Enchantment::getEnchantmentByName($ench4),$ench4level);
                self::addCustomEnchants($item,$ce1,$ce1level);
                self::addCustomEnchants($item,$ce2,$ce2level);
                self::addCustomEnchants($item,$ce3,$ce3level);
                self::addCustomEnchants($item,$ce4,$ce4level);
                self::addCustomEnchants($item,$ce5,$ce5level);
                self::addCustomEnchants($item,$ce6,$ce6level);
                self::addCustomEnchants($item,$ce7,$ce7level);
                $player->getInventory()->addItem($item);


                break;







        }


    }

}





