<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 9:21 PM
 */

namespace Tests\Unit;

use App\Http\Controllers\FormController;
use App\Http\Models\Message;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class MessageTest extends TestCase
{
    use DatabaseTransactions;

    public function test_saveMessageData()
    {
        Event::fake();
        $request = Request::create('/store', 'POST', [
            'name' => 'test name',
            'email' => 'test@gmail.com',
            'message' => 'test message'
        ]);

        $formController = new FormController();
        $formController->saveMessageData($request);

        $this->assertDatabaseHas('message', [
            'email' => 'test@gmail.com',
            'message' => 'test message',
            'name' => 'test name'
        ]);


    }

    public function test_storeShopMsg_getReadMsgs_getUnreadMsgs()
    {
        Event::fake();
        $request = Request::create('/store', 'POST', [
            'name' => 'test name',
            'email' => 'test@gmail.com',
            'message' => 'test message',
            'shop_id' => '1'
        ]);

        $formController = new FormController();
        $formController->storeShopMessage($request);
        $this->assertDatabaseHas('message', [
            'email' => 'test@gmail.com',
            'message' => 'test message',
            'name' => 'test name',
            'shop_id' => '1'
        ]);

        $newMessage = new Message();
        $messages = $newMessage->getUnreadMessages(1);
        foreach ($messages as $message) {
            $this->assertEquals('test message', $message->message);

        }
        $messages = $newMessage->getReadMessages(1);
        $this->assertEmpty($messages);

    }

}