<?php




namespace vale;




use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\Player;
use vale\api\ApiManager;
use vale\Gkits;

class GkitsHandler implements Listener
{


    private $plugin;

    public function __construct(Gkits $plugin)
    {
        $this->plugin = $plugin;
        $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
    }


    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();

        ApiManager::giveRandomGkit($player);


    }


    public function onInteract(PlayerInteractEvent $event)
    {

        $player = $event->getPlayer();
        $inv = $player->getInventory();
        $hand = $inv->getItemInHand();
        $item = $event->getItem();
        $name = $item->getName();
        $butcheritemname = Gkits::getInstance()->getConfig()->get("ButcherItemName");

        if($player->getInventory()->getItemInHand()->getCustomName() === $butcheritemname){


            $item4 = Item::get(54);
            $butchergkitname = Gkits::getInstance()->getConfig()->get("ButcherGkitName");
            $item4->setCustomName($butchergkitname);
            $item4->setLore([


                '§r§4Butcher Gkit Container',
                '§r§a to preview rewards type /preview butcher',

                '§r§c* Butcher Gkit',
                '§r§7purchase on buycraft',

            ]);

            $player->getInventory()->addItem($item4);
            $item = $player->getInventory()->getItemInHand();
            $item->setCount($item->getCount() - 1);
            $player->getInventory()->setItemInHand($item);
        }



    }



    public function onGkitTap(PlayerInteractEvent $event)
    {

        $player = $event->getPlayer();
        $butchergkitname = Gkits::getInstance()->getConfig()->get("ButcherGkitName");
        if ($player->getInventory()->getItemInHand()->getCustomName() ===  $butchergkitname) {
            ApiManager::giveRandomGkitRewards($player);
            $item = $player->getInventory()->getItemInHand();
            $item->setCount($item->getCount() - 1);
            $player->getInventory()->setItemInHand($item);


        }

    }
}
