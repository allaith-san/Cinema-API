<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Requests\V1\AuthenticateCustomerRequest;
use App\Models\Screening;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{


    public function index()
    {
        $customers = QueryBuilder::for(Customer::class)->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::scope('from_id'),
                'name',
                'email',
                'city',
                'zipcode'
            ])
            ->allowedSorts('id', 'name')
            ->allowedIncludes(['tickets'])
            ->paginate(50)->appends(request()->query());
        return new CustomerCollection($customers);
    }


    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }


    public function show(Customer $customer)
    {
        $query = QueryBuilder::for(Customer::class)->where('id',$customer->id)->allowedIncludes(['tickets'])->first();
        return new CustomerResource($query);
    }


    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return new CustomerResource($customer);
    }


    public function destroy(Customer $customer)
    {
        $result = $customer->delete();
        if($result == 1){
            return ["message" => "Customer Deleted!"];
        }else{
            return ["message" => "Couldn't Delete The Customer!"];
        }
    }

    public function authenticateCustomer(AuthenticateCustomerRequest $request){
        $customer = Customer::where('email',$request->email)->get();
        $auth = auth()->guard('customers');

        if($auth->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return [
                "messsage" => "user is authenticated",
                "accessToken" => "XXXX-XXXX-XXXX-XXXX (placeholder)"
            ];
        }
        else
        {
            return [
                "messsage" => "credentials are wrong"
            ];
        }    
    }


}
