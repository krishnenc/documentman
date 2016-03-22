<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Companies;
use App\CompaniesBanks;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use App\Services\UploadsManager;
use DB;
use Illuminate\Support\Facades\File;



class CompaniesController extends Controller
{

    protected $manager;

    protected $fields = [
        'name' => '',
        'website' => '',
        'incorporation_number' => '',
        'incorporation_date' => '',
        'registered_office_address' => '',
        'tel_no' => '',
        'mobile_no' => '',
        'vat_registration_no' => '',
        'vat_registration_date' => '',
        'municipality_license_no' => '',
        'trade_license_no' => '',
        'employer_registration_no' => '',
        'tax_account_no' => '',
        'fax_no' => '',
        'cwa_no' => '',
        'ceb_no' => '',
        'telecom_no' => ''
    ];

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Display only companies allowed
        $user = Auth::user();
        $myCompanies = explode(',', $user->companies);
        $companies = DB::table('companies')->whereIn('id', $myCompanies)->get();
        $role = $user->role()->getResults()->role_name;
        return view('admin.companies.index',compact('companies','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data= (object) $data;
        return view('admin.companies.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CompanyCreateRequest $request)
    {
        $company = new Companies();
        foreach (array_keys($this->fields) as $field) {
            $company->$field = $request->get($field);
        }
        $company->save();
        $result = $this->manager->createDirectory('/'.$company->id);
        $result = $this->manager->createDirectory('/'.$company->id.'/Payroll');
        $result = $this->manager->createDirectory('/'.$company->id.'/Admin');
        $result = $this->manager->createDirectory('/'.$company->id.'/Secretariat');
        $result = $this->manager->createDirectory('/'.$company->id.'/CorporateTax');
        $result = $this->manager->createDirectory('/'.$company->id.'/Accounts');  

        $year = 2014;
        for ($i=0; $i < 3 ; $i++) { 
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year);
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/January');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/February');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/March');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/April');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/May');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/June');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/July');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/August');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/September');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/October');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/November');
            $result = $this->manager->createDirectory('/'.$company->id.'/Accounts'.'/'.$year.'/December');
            $year++;
        }      

        return redirect('/admin/companies')->withSuccess("The company '$company->company' was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,Request $request)
    {
        
        $user = Auth::user();
        $myCompanies = explode(',', $user->companies);

        if (!in_array($id, $myCompanies)){
            return redirect("/admin/companies")->withFailure("Access denied");
        }

        $company = Companies::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $company->$field);
        }
        $folder = $request->get('folder');

        $tab = $request->get('tab');
        //Find files for the current company
        if ($folder == '/' || $folder == ''){
            $folder = '/'.$id;
        }

        $folder_data = (object)  $this->manager->folderInfo($folder);
        $data = (object) $data;

        //Get all the banks
        $banks = DB::table('banks')->get();

        //Get all the bank accounts for company
        $companies_banks = CompaniesBanks::where('company_id', '=', $id)->get();

        $state = 'View';
        if (Auth::user()->role()->getResults()->role_name === 'admin'){
            $state = 'Edit';
        }

        return view('admin.companies.edit', compact('data', 'folder_data','tab','companies_banks','banks','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CompanyCreateRequest $request , $id)
    {
        $company = Companies::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['name'])) as $field) {
            $company->$field = $request->get($field);
        }
        $company->save();
        return redirect("/admin/companies/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect('/admin/companies')
            ->withSuccess("The '$company->name' company has been deleted.");
    }
}
