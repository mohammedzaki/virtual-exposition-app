<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\NoImplementationException;
use App\Exceptions\ValidationException;
use Illuminate\Http\Response as ResponseClass;
use App\Models\User;

/**
 * @Controller(prefix="/api/v1/company")
 * @Resource("/api/v1/company")
 * @Middleware({"cros", "auth:api", "bindings"})
 */
class CompanyController extends Controller {

    protected function validator(array $data, $id = null, $required = 'required') {
        $validator = Validator::make($data, [
            
        ]);

        $validator->setAttributeNames([
        ]);

        return $validator;
    }

    protected function validatorUser(array $data) {
        $validator = Validator::make($data, [
                    'userId' => "required"
        ]);

        $validator->setAttributeNames([
        ]);

        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $validator = $this->validatorUser($request->all());
        if ($validator->fails()) {
            throw new ValidationException($validator->errors());
        } else {
            $user = User::findOrFail($request->userId);
            $companies = $user->companies;
            if (count($companies) == 0) {
                $companies = null;
            }
            return response()->jsonSuccess(ResponseClass::HTTP_OK, $companies);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        throw new NoImplementationException;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $all = $request->all();
        $validator = $this->validator($all);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors());
        } else {
            $company = Company::create($all);
            return response()->jsonSuccess(ResponseClass::HTTP_CREATED, $company);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company) {
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company) {
        return response()->jsonSuccess(ResponseClass::HTTP_OK, $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company) {
        $all = $request->all();
        $validator = $this->validator($all, $company->id, '');
        if ($validator->fails()) {
            throw new ValidationException($validator->errors());
        } else {
            $company->update($all);
            return response()->jsonSuccess(ResponseClass::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        $company->delete();
        return response()->jsonSuccess(ResponseClass::HTTP_OK, null, "patient deleted successfully");
    }

}
