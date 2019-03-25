<?php
/**
 * Created by PhpStorm.
 * User: dwanyoike
 * Date: 03/01/15
 * Time: 14:38
 */

namespace App;

use Auth;
use CodedCell\Classes\RandomColor;
use Config;
use File;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Carbon;
use Illuminate\Support\Facades\Storage;

class Helper
{

    /**
     * @param $customers
     * @param $list
     * @return array
     */
    public static function selectArray($customers)
    {
        $vals = array();
        foreach ($customers as $key => $value) {
            $list['id'] = $key;
            $list['text'] = $value;
            array_push($vals, $list);
        }
        return json_encode($vals);
    }

    public static function generateColor($hue, $count, $luminosity = 'light')
    {
        return RandomColor::many($count, array(
            'hue' => $hue,
            'luminosity' => $luminosity
        ));
    }

    public static function getPurchaseOrderFormats()
    {
        $directory = Config::get('view.paths')[0] . '/purchaseorder/formats';
        return File::files($directory);
    }

    /**
     * @param $product
     * @return array
     */
    public static function checkIfMultipleStorage($productId)
    {
        $product_status = Product::find($productId);
        $multiple_storage = 0;
        if (isset($product_status)) {
            $multiple_storage = $product_status->usesMultipleStorage;
            return $multiple_storage;
        }
        return $multiple_storage;
    }

    public static function getInfo($ip, $oid, $community = 'public')
    {
        try {
            $info = \snmpget($ip, $community, $oid);
            $info = explode(":", $info);
            $info = str_replace('(', '', $info[1]);
            $info = str_replace('"', '', $info);
            if ($info[0] == "Hex-STRING") {
                return "";
            }
            return trim($info);
        } catch (\Exception $e) {
            return $e->getMessage();
        }


    }


    /**
     * @return string
     * Used to get path to store avatar
     */
    public static function avatar()
    {
        if (Auth::user() && Auth::user()->avatar != null) {
            return url(Storage::url(Auth::user()->avatar));
        } else {
            return url(Storage::url('avatar/placeholder.png'));
        }

    }

    /**
     * Get List of users
     */
    public static function getUser()
    {
        if (Auth::user()) {
            return Auth::user();
        }
    }

    /**
     * @param string $path
     * @return mixed Used to generate download paths
     * Used to generate download paths
     */
    public static function downloadPath($path = '')
    {
        $str = public_path();
        $str = str_replace("\\application\\public", "", $str);
        $str = str_replace('/application/public', "", $str);
        return $str . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    public static function paginateQuery(
        $query,
        $count,
        $limit,
        $page,
        $queryString,
        $path
    )
    {
        $paginator = new Paginator($query, $count, $limit, $page, [
            'query' => $queryString
        ]);
        $paginator->setPath($path);
        return $paginator;
        /*
                $paginator = new Paginator($supplier, $this->getSuppliersCount(), env('RECORDS_VIEW'), null, [
                    'query' => $params['sort']
                ]);
                $paginator->setPath('/supplier');
                return $paginator;
        */
    }

    /**
     * @param $data
     * Saves barcode to png
     */
    public static function saveBarcode($data)
    {
        /*
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        */
        $path = storage_path() . '/fucklife.png';
        file_put_contents($path, base64_decode($data));
    }

    public static function fontawesomeArray()
    {
        $path = base_path() . '/public/assets/css/font-awesome.css';
        $class_prefix = 'fa-';
        $pattern = '/\.(' . $class_prefix . '(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
        $subject = file_get_contents($path);

        preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

        $icons = array();

        foreach ($matches as $match) {
            $icons[$match[1]] = $match[1];
        }

        //  $icons = var_export($icons, TRUE);
        //$icons = stripslashes($icons);

        return $icons;
    }


    /**
     * @param $d
     * @return array
     * Converts Query builder data to array
     */
    public static function objectToArray($d)
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map([__CLASS__, __METHOD__], $d);
        } else {
            // Return array
            return $d;
        }
    }

    /**
     * @return mixed
     * Used to generate download paths
     */
    public static function downloadPathWithFolder($folder)
    {
        $str = public_path();
        $str = str_replace("\\application\\public", "", $str);
        $str = str_replace('/application/public', "", $str);
        return $str . "/" . $folder;
    }

    /**
     * @param $englishWord
     * @param $file
     * @param $limit
     * @param string $placement
     * @return string
     * Use as Below
     *  {!! \App\Helper::translateAndShorten('test','dashboard',2,'top')!!}
     */
    public static function translateAndShorten($englishWord, $file, $limit, $placement = 'top')
    {
        $translationFile = $file . '.' . $englishWord;
        $translation = trans($translationFile);
        if (strlen($translation) > 12) {
            return '<span class="translate" data-toggle="tooltip" data-placement="' . $placement . '" title="' . $translation . '" >' . str_limit($translation, $limit) . '</span>';

        }
        return $translation;
    }

    public static function popover($title, $content)
    {

        return 'data-container="body" data-toggle="popover" title="' . $title . '" data-content="' . $content . '" trigger="hover"';
    }

    public static function checked($size)
    {
        $page = Setting::firstOrCreate(['userId' => Auth::user()->id]);
        if ($page->paginationDefault == $size) {
            return 'checked=true';
        }
    }

    public static function sendSms($type, $invoice, $dueAmount = 0, $payment = 0)
    {
        $items = array();
        foreach ($invoice->items as $item) {
            array_push($items, $item->productDescription);
        }
        $string = implode(",", $items);
        $date = Carbon::today()->format('Y-m-d');
        $template = array(
            'payment' => "Your payment of {$invoice->currencyTypeText} {$payment} has been accepted. Your current due amount is {$invoice->currencyTypeText} $dueAmount",
            'payment_reminder' => "Please pay your outstanding amount to avoid late payment charges and uninterrupted service",
            'delivery' => "Your order for {$string} Has been delivered on {$date}. Your current due amount is {$dueAmount}"
        );
        $sms_url = env('SMS_URL');

        $sms_arr = array('AUTH_KEY' => env('SMS_AUTH_KEY'), 'message' => urldecode($template[$type]),
            'senderId' => env('SMS_SENDERID'), 'routeId' => '1', 'smsContentType' => 'english',
            'mobileNos' => '9990378883');

        $querystring = http_build_query($sms_arr);

        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $sms_url, [
                'query' => $querystring
            ]);
            echo $res->getStatusCode();
            echo $res->getBody();

        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $response;
        }

    }

}