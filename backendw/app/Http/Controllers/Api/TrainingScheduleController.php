<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Library\ApiHelpers;

use App\Models\TrainingSchedule;

use App\Http\Resources\TrainingScheduleResource;
use Illuminate\Support\Facades\Storage;

class TrainingScheduleController extends Controller
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
            return TrainingScheduleResource::collection(TrainingSchedule::with('courses')->orderBy('id', 'desc')->get());
        } else {
            return TrainingScheduleResource::collection(TrainingSchedule::with('courses')->get()->orderBy('id', 'desc')->where('user_id', $user->id));
        }
        return $this->onError(401, 'У вас не достаточно прав для просмотра графика обучения');
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
                    'date'      => ['required'],
                    'weekday'   => ['required'],
                    'course_id' => ['required']
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages(),
                ], 422);
            }

            $trainingSchedule = TrainingSchedule::create([
                'date'      => $request->date,
                'weekday'   => $request->weekday,
                'course_id' => $request->course_id
            ]);
            
            return $this->onSuccess($course, 'График обучения успешно добавлен', 201);
        }
        return $this->onError(401, 'У вас нет прав для добавления графика');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return new TrainingScheduleResource(TrainingSchedule::with('сourses')->findOrFail($id));
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
            // $borrowerPhotoName = 'photo_avatar.' . $request->file('photo')->guessExtension();
            // $borrowerPhotoPath = $request->file('photo')->move(public_path() . '/uploads/' . $request->first_name . '_' . $request->second_name, $borrowerPhotoName);
            // $borrowerPhotoUrl = url($borrowerPhotoPath);

            // $borrowerPhotoLocationName = 'photo_location.'. $request->file('photo_location') .'.jpg';
            // $borrowerPhotoLocationPath = $request->file('photo_location')->move(public_path() . '/uploads/' . $request->first_name . '_' . $request->second_name, $borrowerPhotoLocationName);
            // $borrowerPhotoLocationUrl = url($borrowerPhotoLocationPath);
            
            $borrower                             = Borrower::find($id);
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
            TrainingSchedule::destroy($id);

            return ["message" => "График обучения удален"];
        }
        return $this->onError(401, 'У вас нет прав для удаления графика обучения');
    }
}
