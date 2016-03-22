<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CompaniesBanks;
use App\Http\Controllers\Controller;

class CompanyBankController extends Controller
{

    protected $fields = [
        'account_no' => '',
        'company_id' => '',
        'bank_id' => '',
        'currency' => ''
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new CompaniesBanks();
        foreach (array_keys($this->fields) as $field) {
            $company->$field = $request->get($field);
        }
        $company->save();
        return redirect('/admin/companies/'.$company->company_id.'/edit?tab=banks')
            ->withSuccess("The account '$company->account_no' was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteBank(Request $request)
    {
        echo "d";
        $bank = $request->get('bank_id');
        $company_id = $request->get('company_id');

        $company = CompaniesBanks::findOrFail($bank);
        $company->delete();
        return redirect('/admin/companies/'.$company_id.'/edit?tab=banks')
            ->withSuccess("The account '$company->account_no' was deleted.");
    }
}
