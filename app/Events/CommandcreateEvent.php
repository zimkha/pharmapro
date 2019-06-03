<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Bon_commande;
class CommandcreateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $id;

    /**
     * Create a new event instance.
     * @param Bon_commande $commande
     * @return void
     */
    public function __construct(Bon_commande $commande)
    {
         $this->id =  $commande->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       return  new Channel ('createAction');
    }

    public function broadcastAs()
    {
         return 'creation-commande'
    }
}
