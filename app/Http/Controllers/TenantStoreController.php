<?php

namespace App\Http\Controllers;

use App\Models\Tenant;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantStoreController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:domains,domain',
            'email' => 'required|email|max:255|unique:tenants,email',
            'password' => 'required|string|max:255',
        ],[
            'name.required' => 'The name field is required.',
            'domain.required' => 'The domain field is required.',
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required.',
        ]);

        $tenant = Tenant::create([
            'id'=> strtolower($request->name),
            'name' => $request->name,
            'domain' => $request->domain.'.'.config('app.domain'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain . '.' . config('app.domain'),
            'tenant_id' => $tenant->id
        ]);


        return redirect()->back()->with('success', 'Tenant created successfully.');
    }

    public function show($id)
    {
      ;
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
