<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Document;
use function PHPUnit\Framework\returnArgument;

class AppController extends Controller
{
    public function dashboard()
    {
        $role = auth()->user()->user_role;

        if ($role == 'admin') {
            $activities = Activity::latest()->take(10)->get();
            return view('dashboard.adminrole', compact('activities'));
        }

        if ($role == 'customer') {
            $users = User::find(auth()->id());
            return view('dashboard.customerrole', compact('users'));
        }

        return abort(403, 'Unauthorized');
    }

    public function create()
    {
        return view('dashboard.create'); 
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:users',
            'password'=> 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'user_role'=> 'customer',
            'house'    => $request->house,
            'street'   => $request->street,
            'city'     => $request->city,
            'province' => $request->province,
            'password' => Hash::make($request->password),
        ]);

        Activity::create([
            'type'    => 'customer_add',
            'message' => 'New customer "' . $request->name . '" was added',
        ]);

        return back()->with('success', 'Customer Added Successfully!');
    }

    public function index()
    {
        $customers = User::where('user_role', 'customer')->get();
        return view('dashboard.index', compact('customers'));
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('dashboard.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:users,email,' . $customer->id,
            'house'   => 'required',
            'street'  => 'required',
            'city'    => 'required',
            'province'=> 'required',
        ]);

        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->house    = $request->house;
        $customer->street   = $request->street;
        $customer->city     = $request->city;
        $customer->province = $request->province;

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }

        $customer->save();

        Activity::create([
            'type'    => 'customer_update',
            'message' => 'Customer profile "' . $customer->name . '" was updated',
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Customer Updated Successfully!');
    }

    public function profile($id)
    {
        $customer = User::findOrFail($id);
        return view('dashboard.profile', compact('customer'));
    }

    public function delete($id)
    {
        $customer = User::findOrFail($id);

        Activity::create([
            'type'    => 'customer_delete',
            'message' => 'Customer "' . $customer->name . '" was deleted',
        ]);

        $customer->delete();

        return redirect()->route('dashboard.index')->with('success', 'Customer Deleted Successfully!');
    }

    public function documents()
    {
        $documents = Document::all();
        return view('dashboard.document', compact('documents'));
    }

    public function uploaddocuments(Request $request)
    {
        $request->validate([
            'document' => 'required|file|max:2048',
            'category' => 'required',
        ]);

        if ($request->hasFile('document')) {

            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName);

            Document::create([
                'file_name' => $fileName,
                'category'  => $request->category,
                'file_path' => $filePath,
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $file->getSize(),
            ]);

            Activity::create([
                'type'    => 'document_upload',
                'message' => 'Document "' . $fileName . '" was uploaded',
            ]);

            return back()->with('success', 'Document uploaded successfully!');
        }

        return back()->with('error', 'No file selected');
    }

    public function downloadDocuments($id)
    {
        $document = Document::findOrFail($id);

        if (!Storage::exists($document->file_path)) {
            return back()->with('error', 'File not found');
        }

        return Storage::download($document->file_path);
    }

    public function deleteDocuments($id)
    {
        $document = Document::findOrFail($id);

        Storage::delete($document->file_path);

        Activity::create([
            'type'    => 'document_delete',
            'message' => 'Document "' . $document->file_name . '" was deleted',
        ]);

        $document->delete();

        return back()->with('success', 'Document delete successfully!');
    }

    public function previewDocument($id)
    {
        $doc = Document::findOrFail($id);
        return response()->file(storage_path('app/private/' . $doc->file_path));
    }

    public function listDocuments(Request $request)
    {
        $query = Document::query();

        if ($request->filled('search')) {
            $query->where('file_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $documents = $query->get();

        return view('dashboard.document', compact('documents'));
    }

    public function customerdetails()
    {
        $customers = User::all();
        return view('dashboard.customerdetails', compact('customers'));
    }

    public function editdetails($id)
    {
        $customer = User::findOrFail($id);
        return view('dashboard.editdetails', compact('customer'));
    }

    public function updateDetails($id, Request $request)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:users,email,' . $customer->id,
            'house'   => 'required',
            'street'  => 'required',
            'city'    => 'required',
            'province'=> 'required',
        ]);

        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->house    = $request->house;
        $customer->street   = $request->street;
        $customer->city     = $request->city;
        $customer->province = $request->province;

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }

        $customer->save();

        Activity::create([
            'type'    => 'customer_update_by_admin',
            'message' => 'Customer "' . $customer->name . '" details updated by admin',
        ]);

        return redirect()->route('dashboard.customerdetails')->with('success', 'Customer Updated Successfully!');
    }

    public function viewprofile($id)
    {
        $customer = User::findOrFail($id);
        return view('dashboard.viewprofile', compact('customer'));
    }

    public function deletedetails($id)
    {
        $customer = User::findOrFail($id);

        Activity::create([
            'type'    => 'customer_delete_by_admin',
            'message' => 'Customer "' . $customer->name . '" was deleted by admin',
        ]);

        $customer->delete();

        return redirect()->route('dashboard.customerdetails')->with('success', 'Customer Deleted Successfully!');
    }
    public function customers()
    {
        $customers = User::paginate(5);
        return view('dashboard.index',compact('customers'));
    }
    public function customer()
{
    $customers = User::paginate(5);
    return view('dashboard.customerdetails', compact('customers'));
}
public function terms()
{
    return view('dashboard.terms');
}
public function quickProcessing()
{
    return view('dashboard.quick-processing');
}

public function support()
{
    return view('dashboard.support');
}
public function perfomanceAnalytics()
{
    return view('dashboard.perfomance-analytics');
}
public function emergencySupport()
{
    return view('dashboard.emergency-support');
}
public function liveChat()
{
    return view('dashboard.live-chat');
}
public function phoneSupport()
{
    return view('dashboard.phone-support');
}
public function emailSupport()
{
    return view('dashboard.email-support');
}
public function composeEmail()
{
    return view('dashboard.compose-email');
}
public function generalSupport()
{
    return view('dashboard.general-support');
}
}
