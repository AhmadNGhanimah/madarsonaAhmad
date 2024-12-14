<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\Message;
use App\Models\MessageMedia;
use App\Models\Scopes\UserScope;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncWhatsappCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-whatsapp-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Lead::truncate();
        Message::truncate();
        MessageMedia::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $chats = getChats();
        foreach ($chats as $chat) {
            if (!$chat->isGroup && $chat->id->_serialized && $chat->id->server == 'c.us' && $chat->id->user != '0') {
                Lead::withoutGlobalScope(new UserScope)->updateOrcreate(['serialized' => $chat->id->_serialized,], [
                    'name' => $chat->name,
                    'phone' => $chat->id->user,
                    'serialized' => $chat->id->_serialized,
                    'unread_count' => $chat->unreadCount,
                    'timestamp' => $chat->timestamp ?? null,
                ]);
            }
        }

        /* $leads = Lead::withoutGlobalScope(new UserScope)->get();
         foreach ($leads as $lead) {
             Message::where('lead_id', $lead->id)->delete();
             foreach (getChatMessages($lead->serialized) as $message) {
                 Message::updateOrcreate(['message_id' => $message->id->id], [
                     'timestamp' => $message->timestamp,
                     'from_me' => $message->fromMe,
                     'ack' => isset($object->ack) ? $message->ack : 0,
                     'has_media' => $message->hasMedia,
                     'type' => $message->type,
                     'data' => json_encode($message),
                     'lead_id' => $lead->id,
                 ]);
             }
         }

         Message::whereIn('type', ['ptt', 'image'])->get()->each(function ($message) {
             $media = getMessageMedia($message->Lead->serialized, $message->message_id);
             if ($media) {
                 MessageMedia::updateOrcreate(['message_id' => $message->id], [
                     'data' => $media->data,
                     'mimetype' => $media->mimetype,
                     'filesize' => $media->filesize,
                 ]);
             }
         });*/
    }
}
