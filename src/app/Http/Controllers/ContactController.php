<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'family_name', 'last_name', 'gender', 'email', 'postcode',
            'address', 'building_name', 'opinion'
        ]);
        return view('confirm', compact('contact'));
    }

    public function complete(Request $request)
    {
        if ($request->input('submit_status') == 'confirm') {
            return redirect('/')->withInput();
        } else {
            $contact = $request->only(['gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
            $contact['fullname'] = $request->input('family_name') . $request->input('last_name');
            Contact::create($contact);
            return view('thanks');
        }
    }

    public function default_search()
    {
        $contacts = DB::table('Contact');
        $results = $contacts->select(['id', 'fullname', 'gender', 'email', 'opinion'])->Paginate(10);
        $search = [
            'name' => null,
            'gender' => 0,
            'date_start' => null,
            'date_last' => null,
            'email' => null
        ];
        return view('manage', compact('results', 'search'));
    }

    public function search(Request $request)
    {
        $search = $request->only([
            'name', 'date_start', 'date_last', 'gender', 'email'
        ]);

        $contacts = DB::table('Contact');
        $results = $contacts->select(['id', 'fullname', 'gender', 'email', 'opinion']);

        if ($request['name'] != null) {
            $results = $results->where('fullname', 'like', '%' . $request['name'] . '%');
        }

        switch ($request['gender']) {
            case 1:
                $results = $results->where('gender', 1);
                break;

            case 2:
                $results = $results->where('gender', 2);
                break;

            default:
                // 処理なし
                break;
        }

        if ($request['date_start'] != null) {
            $results = $results->where('created_at', '>=', $request['date_start']);
        }

        if ($request['date_last'] != null) {
            $results = $results->where('created_at', '<=', $request['date_last']);
        }

        if ($request['email'] != null) {
            $results = $results->where('email', 'like', '%' . $request['email'] . '%');
        }

        $results = $results->paginate(10);

        return view('manage', compact('results', 'search'));
    }

    public function delete(Request $request)
    {
        $search = $request->only(['id']);
        DB::table('Contact')->where('id', $search['id'])->delete();
        return redirect('/manage');
    }
}
