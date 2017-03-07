<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visit;

class MessageController extends Controller
{

    public function messageWhatsapp($phoneNum, $textMessage, Request $request)
    {
        // save visits data if permission given by users

        $referrer = $request->headers->get('referer');
        $referrer_ip = $request->ip();
        $visit_url = url()->current();

        if (empty($referrer)) {
            $referrer = '';
        }

        $user_id = NULL;
        $campaign_id = NULL;

        $visit_data = ['referrer'=>$referrer, 'url'=>$visit_url, 'ip'=>$referrer_ip, 'user_id'=>$user_id, 'campaign_id'=>$campaign_id];

        Visit::create($visit_data);

        // save FB Ads Pixel, Remarketing, Analytics, etc

        // later move the code to Jobs and Events

        // redirect to WhatsApp web / mobile app

        $user_agent = $request->header('User-Agent');
        $os = $this->getOS($user_agent);

        if(in_array($os,array('Android','iPhone','Blackberry','Mobile'))) {
            $whatsapp_link = "whatsapp://send?text=$textMessage.phone=+$phoneNum";
        }
        else
        {
            $whatsapp_link = "https://web.whatsapp.com/send?text=$textMessage&phone=$phoneNum";
        }

        return redirect($whatsapp_link);

    }

    function getOS($user_agent) {
        $os_array =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }

        return $os_platform;
    }

}
