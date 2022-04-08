<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Library\ApiHelpers;

use App\Models\Lead;

use App\Http\Resources\LeadResource;
use Illuminate\Support\Facades\Storage;

class LeadController extends Controller
{
    use ApiHelpers; // <---- Использование трейта apiHelpers

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($this->isAdmin($user)) {
            return LeadResource::collection(Lead::with('leads')->orderBy('id', 'desc')->get());
        } else {
            return LeadResource::collection(Lead::with('leads')->get()->orderBy('id', 'desc')->where('user_id', $user->id));
        }
        return $this->onError(401, 'У вас не достаточно прав для просмотра заявок');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->isAdmin($request->user()) || $this->isManager($request->user())) {
            $validator = Validator::make(
                $request->all(),
                [
                    'lead_name'         => ['required'],
                    'lead_phone'        => ['required'],
                    'course_id'         => ['required']
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages(),
                ], 422);
            }

            $lead = Lead::create([
                'lead_name'     => $request->lead_name,
                'lead_email'    => $request->lead_email,
                'lead_phone'    => $request->lead_phone,
                'course_id'     => $request->course_id
            ]);
            
            return $this->onSuccess($lead, 'Заявка успешно отправлена', 201);
        }
        return $this->onError(401, 'У вас нет прав для отправки заявки');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        if ($this->isAdmin($user)) {
            return new LeadResource(Lead::findOrFail($id));
        } else {
            return new LeadResource(Lead::findOrFail($id)->where('user_id', $user->id));
        }
        return $this->onError(401, 'У вас нет прав для просмотра заявок');
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
        $user = $request->user();
        if ($this->isAdmin($user) || $this->isManager($user)) {
            $borrower                             = Lead::find($id);
            $borrower->first_name                 = $request->first_name;
            $borrower->second_name                = $request->second_name;
            $borrower->middle_name                = $request->middle_name;
            $borrower->phone                      = $request->phone;
            $borrower->mobile_alternative         = $request->mobile_alternative;
            $borrower->mobile_alternative_second  = $request->mobile_alternative_second;
            $borrower->gender                     = $request->gender;
            $borrower->dob                        = $request->dob;
            $borrower->status                     = $request->status;
            $borrower->country_id                 = $request->country_id;
            $borrower->passport_numb              = $request->passport_thumb;
            $borrower->passport_series            = $request->passport_series;
            $borrower->passport_address           = $request->passport_address;
            $borrower->passport_date              = $request->passport_date;
            $borrower->passport_registration      = $request->passport_registration;
            $borrower->address                    = $request->address;
            $borrower->state                      = $request->state;
            $borrower->city                       = $request->city;
            $borrower->zip                        = $request->zip;
            $borrower->user_id                    = $request->user_id;
            $borrower->notes                      = $request->note;
            $borrower->save();

            return [
                "message" => "Клиент успешно обновлен"
            ];
        }
        return $this->onError(401, 'У вас нет прав для изменения клиента');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($this->isAdmin($request->user())) {
            Lead::destroy($id);

            return ["message" => "Заявка успешно удалена"];
        }
        return $this->onError(401, 'У вас нет прав для удаления заявок');
    }
}
