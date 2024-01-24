<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domains;
use Illuminate\Http\Response;


class DomainsController extends Controller
{

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',    
            'email' => 'required|email',    
            'domain_name' => 'required',    
            'home_page_url' => 'required|url',    
            'privacy_policy_url' => 'required|url',    
            'contact_us_url' => 'required|url',    
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
        
            // Create an array to store errors with field names
            $responseErrors = [];
        
            foreach ($errors->keys() as $field) {
                $responseErrors[$field] = $errors->get($field);
            }
        
            return response()->json(['errors' => $responseErrors], Response::HTTP_BAD_REQUEST);
        }

        $name = $request->get('name');
        $email = $request->get('email');
        $domain_name = $request->get('domain_name');
        $home_page_url = $request->get('home_page_url');
        $privacy_policy_url = $request->get('privacy_policy_url');
        $contact_us_url = $request->get('contact_us_url');


        $addDomainsData = Domains::create([
            'name' => $name,
            'email' => $email,
            'domain_name' => $domain_name,
            'home_page_url' => $home_page_url,
            'privacy_policy_url' => $privacy_policy_url,
            'contact_us_url' => $contact_us_url,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
		
        return Response()->json(['status'=>200, 'message'=>'Domain Details Added Successfully']);
    }
}
