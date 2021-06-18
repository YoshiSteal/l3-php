<?php


namespace App\Controller;

use GuzzleHttp\Client;

class ToDoController extends Controller
{

    public function home()
    {
        // Use guzzle call api todo
        // https://jsonplaceholder.typicode.com/todos
        $client = new Client();
        $res = $client->request('GET',"http://jsonplaceholder.typicode.com/todos?userId=1");
        $json = json_decode($res->getBody()->getContents(), true);

        $this->render('guzzle/view.phtml', ['guzzle' => $json]);
    }

}