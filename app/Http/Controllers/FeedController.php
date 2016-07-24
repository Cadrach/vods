<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

class FeedController extends Controller
{
    protected function curl($url, array $get = [], array $options = array())
    {
        $defaults = array(
            CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 50,
            CURLOPT_SSL_VERIFYPEER => false,
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result = curl_exec($ch))
        {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return json_decode($result, true);
    }

    public function getPullEvents(){
        $page = $this->curl('https://www.reddit.com/r/LoLeventVoDs/.json');
        
        foreach($page['data']['children'] as $event){
            $fields = [
                'code' => $event['data']['name'],
                'title' => $event['data']['title'],
                'permalink' => $event['data']['permalink'],
                'html' => $event['data']['selftext'],
                'last_edited' => Carbon::createFromTimestampUTC($event['data']['edited']),
            ];
            Event::firstOrNew(['code'=>$event['data']['name']])->fill($fields)->save();
        }
    }

    public function getAnalyzeEvents(){
        foreach(Event::all() as $event){
            echo $event->html;
            die();
        }
    }


}
