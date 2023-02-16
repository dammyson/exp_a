<?php

namespace App\Services\User;


use App\Services\BaseServiceInterface;
use App\Models\User;
use App\Services\Utilities\PostHttpRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RegistrationService implements BaseServiceInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        return $this->processInvite();
    }

    private function processInvite()
    {
        return  \DB::transaction(function () {
            $new_user = $this->createConfirmedUser($this->data);
            return $new_user;
        });
    }

    private function createConfirmedUser($data)
    {
        $res = $this->createApiUser($data);
        if($res){
          $user = $this->createUser($data, $res->data);
         return $user;
         }else{
             Log::error("::::::::::Custormer was not created");
             throw new Exception("Custormer was not created");
         }
 
    }

    private function createUser($data, $customer)
    {
        $user = new User();

        $user->id = uniqid();
        $user->email = $data['email'];
        $user->customer_id = $customer->_id ;
        $user->phone_number = $data['phone_number'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->password = $data['password'];
        $user->status = "active";
        $user->save();


        return $user;
    }


    private function createApiUser($data)
    {
        $url = env('BASE_URL') . 'customers';
        
        $body=[
            "type"=> "individual",
            "name"=> $data['first_name']. " " .$data['last_name'],
            "phoneNumber"=> $data['phone_number'],
            "emailAddress"=> $data['email'],
            "status"=> "active",
            "individual"=> [
                "firstName"=> $data['first_name'],
                "lastName"=> $data['last_name']],
            "billingAddress"=> [
                "line1" => $data['address']['address_line_1'],
                "line2"=> $data['address']['address_line_2'],
                "city"=> $data['address']['city'],
                "state"=> $data['address']['state'],
                "country"=>$data['address']['country'],
                "postalCode"=> $data['address']['zip']
                ]
            ];

            $res = new PostHttpRequest($url,$body);
            $res =  $res->run();
            return $res;
    }

   

}
