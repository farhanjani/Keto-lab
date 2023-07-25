<?php
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Models\Offer;

function calculate_total($all_offers){
    $total = 0.00;
    if(!empty($all_offers)){
        foreach($all_offers as $key => $val){
            if(Offer::where('id', $key)->exists()){
                $offer_info = Offer::where('id', $key)->first();
                $total += $offer_info->price*$val;
            }
        }
    }
    return round($total, 2);
}

function import_products($product_id = ''){
    $curl = curl_init();

    $post_data = array(
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
    );

    if(!empty($product_id)){
        $post_data['productId'] = $product_id;
    }

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.konnektive.com/product/query/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function import_checkoutchamp_products($campaign_id){
    $curl = curl_init();
    $post_data = array(
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
    );
    if(!empty($campaign_id)){
        $post_data['campaignId'] = $campaign_id;
    }
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.checkoutchamp.com/campaign/query/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function import_upsale($productId){
    $curl = curl_init();
    $post_data = array(
        'loginId' => config('constants.options.loginId'),
        'orderId' => Session::get('orderId'),
        'productId' => $productId,
        'password' => config('constants.options.password'),
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.konnektive.com/upsale/import/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function query_product($productId){
    $curl = curl_init();
    $post_data = array(
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
        'productId' => $productId
    );

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.konnektive.com/product/query/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function import_all_campaigns($campaign_id = ''){
    $curl = curl_init();
    $post_data = array(
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
    );
    if(!empty($campaign_id)){
        $post_data['campaignId'] = $campaign_id;
    }
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.konnektive.com/campaign/query/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function debug($arr, $flag = false){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    if($flag == true){
        exit;
    }
}

function deleteImage($directory='', $image){
    $path = $directory.'/'.$image;
    $thumb_path = $directory.'/thumb_'.$image;
    if(Storage::disk('s3')->exists($path)) {
        Storage::disk('s3')->delete(array($path, $thumb_path));
    }
}

function saveImageUsingURL($file, $directory='', $thumbnail=false, $width=300, $height=300){
    $img_data = file_get_contents($file);
    $img = Image::make($img_data);
    $mime_type = $img->mime();
    $extension = explode('/', $mime_type)[1];
    $name = time().'.'.$extension;

    $original_image_path = $directory."/".$name;
    $img->save(storage_path($name));
    $localPath = storage_path($name);
    Storage::disk('s3')->put($original_image_path, file_get_contents($localPath), 'public');
    unlink(storage_path($name));

    if($thumbnail == true){
        $url = Storage::disk('s3')->url($original_image_path);
        $s3File = file_get_contents($url);
        $image = Image::make($s3File)->resize($width, $height);
        $path = $directory."/thumb_".$name;
        Storage::disk('s3')->put($path, $image->encode(), 'public');
    }
    return $name;
}

function saveImage($file, $directory='', $thumbnail=false, $width=300, $height=300){
    $name = time().'.'.$file->getClientOriginalExtension();
    $img = Image::make($file);
    $original_image_path = $directory."/".$name;
    $img->save(storage_path($name));
    Storage::disk('s3')->put($original_image_path, file_get_contents(storage_path($name)), 'public');
    unlink(storage_path($name));

    if($thumbnail == true){
        $url = Storage::disk('s3')->url($original_image_path);
        $s3File = file_get_contents($url);
        $image = Image::make($s3File)->resize($width, $height);
        $path = $directory."/thumb_".$name;
        Storage::disk('s3')->put($path, $image->encode(), 'public');
    }
    return $name;
}

function saveExisitingImage($file, $directory = '', $thumbnail = false, $width = 300, $height = 300)
{
    $name = time() . '.' . pathinfo($file, PATHINFO_EXTENSION);
    $publicPath = public_path($file);

    $img = Image::make($publicPath);
    $original_image_path = $directory . '/' . $name;
    $img->save(storage_path($name));
    Storage::disk('s3')->put($original_image_path, file_get_contents(storage_path($name)), 'public');
    unlink(storage_path($name));

    if ($thumbnail) {
        $url = Storage::disk('s3')->url($original_image_path);
        $s3File = file_get_contents($url);
        $image = Image::make($s3File)->resize($width, $height);
        $path = $directory . '/thumb_' . $name;
        Storage::disk('s3')->put($path, $image->encode(), 'public');
    }

    return $name;
}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function import_click($click_data){
    $import_click_data = array(
        'campaignId' => $click_data['campaign_id'],
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
        'pageType' => 'presellPage',
        'requestUri' => 'http://127.0.0.1:8000/product-detail-type4/livetemppro'
    );
    $url = 'https://api.konnektive.com/landers/clicks/import/';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $import_click_data,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function import_lead($lead_data){
    $import_lead_data = array(
        'address1' => $lead_data['address'],
        'campaignId' => $lead_data['campaign_id'],
        'city' => $lead_data['city'],
        'country' => 'US',
        // 'country' => $lead_data['country'],
        'emailAddress' => $lead_data['email'],
        'ipAddress' => get_client_ip(),
        'firstName' => $lead_data['firstName'],
        'lastName' => $lead_data['lastName'],
        'loginId' => config('constants.options.loginId'),
        'password' => config('constants.options.password'),
        'phoneNumber' => $lead_data['phone'],
        'postalCode' => $lead_data['zipcode'],
        'product1_id' => $lead_data['crm_id'],
        'state' => 'NY',
        'sessionId' => $lead_data['sessionId']
    );

    $url = 'https://api.konnektive.com/leads/import/';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $import_lead_data,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function import_order($order_data){
    $cardMonth = substr($order_data['cardExpiryDate'], 0, 2);
    $cardYear = substr($order_data['cardExpiryDate'], 2, 4);

    $import_order_data = array(
        'address1' => $order_data['address'],
        'cardNumber' => $order_data['cardNumber'],
        'city' => $order_data['city'],
        'country' => 'US',
        // 'country' => $order_data['country'],
        'emailAddress' => $order_data['email'],
        'firstName' => $order_data['firstName'],
        'ipAddress' => get_client_ip(),
        'lastName' => $order_data['lastName'],
        'loginId' => config('constants.options.loginId'),
        'orderId' => $order_data['orderId'],
        'password' => config('constants.options.password'),
        'paySource' => 'CREDITCARD',
        'phoneNumber' => $order_data['phone'],
        'postalCode' => $order_data['zipcode'],
        'state' => 'NY',
        'campaignId' => $order_data['campaign_id'],
        'cardMonth' => $cardMonth,
        'cardSecurityCode' => $order_data['cardCvv'],
        'cardYear' => $cardYear,
        'product1_id' => $order_data['crm_id'],
        'billShipSame' => 1
    );

    if(session('query_params')){
        $query_params = session('query_params');

        if(isset($query_params['c1'])){
            $import_order_data['sourceValue1'] = $query_params['c1'];
        }

        if(isset($query_params['c2'])){
            $import_order_data['sourceValue2'] = $query_params['c2'];
        }

        if(isset($query_params['c3'])){
            $import_order_data['custom1'] = $query_params['c3'];
        }
        
        if(isset($query_params['c4'])){
            $import_order_data['custom2'] = $query_params['c4'];
        }

        if(isset($query_params['c5'])){
            $import_order_data['custom3'] = $query_params['c5'];
        }
    }

    $url = 'https://api.konnektive.com/order/import/';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $import_order_data,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
?>
