<?php

namespace vale;


use muqsit\invmenu\InvMenuHandler;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use vale\GkitsHandler;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\network\mcpe\protocol\ContainerClosePacket;
use pocketmine\item\Item;
use vale\api\ApiManager;
use vale\commands\PreviewCommand;
use vale\commands\GkitComamnd;

class Gkits extends PluginBase implements  Listener
{

    private $api;
    private static $instance;
    private $cancel_send = true;


    public function onEnable(): void
    {

        if (!InvMenuHandler::isRegistered()) {
            InvMenuHandler::register($this);
        }

        self::$instance = $this;
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->api = new ApiManager();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new GkitsHandler($this), $this);
        $this->registerCommands();


    }

    public function getApi(): ApiManager
    {

        return $this->api;

    }

    public static function getInstance(): Gkits
    {

        return self::$instance;
    }


    public function registerCommands()
    {

        $this->cmd = $this->getServer()->getCommandMap();


        $key = $this->getConfig()->get("CommandName");

        $this->cmd->register("preview", new PreviewCommand($this));
        $this->cmd->register("$key", new GkitComamnd($this));

    }
      public function onDataPacketSend(DataPacketSendEvent $event) : void{
        if($this->cancel_send && $event->getPacket() instanceof ContainerClosePacket){
            $event->setCancelled();
        }
    }

    /**
     * @param DataPacketReceiveEvent $event
     * @priority NORMAL
     * @ignoreCancelled true
     */
    public function onDataPacketReceive(DataPacketReceiveEvent $event) : void{
        if($event->getPacket() instanceof ContainerClosePacket){
            $this->cancel_send = false;
            $event->getPlayer()->sendDataPacket($event->getPacket(), false, true);
            $this->cancel_send = true;
        }
    }

}
