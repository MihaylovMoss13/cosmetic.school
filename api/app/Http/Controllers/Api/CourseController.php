<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Library\ApiHelpers;

use App\Models\Course;

use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    use ApiHelpers; // <---- Использование трейта apiHelpers

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CourseResource::collection(Course::get());
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
                    'title'                     => ['required'],
                    'course_description'        => ['required'],
                    'course_duration'           => ['required'],
                    'course_price'              => ['required'],
                    'course_old_price'          => ['required'],
                    'course_credit_info'        => ['required'],
                    'course_medicine_info'      => ['required'],
                    'course_thumb'              => ['required'],
                    'course_video'              => ['required'],
                    'advantages'                => ['required'],
                    'course_program'            => ['required'],
                    'course_program_pdf'        => ['required'],
                    'course_contract_url'       => ['required'],
                    'limit_users'               => ['required'],
                    'course_type'               => ['required']
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages(),
                ], 422);
            }
            
            if ($request->hasFile('course_thumb')) {
                $courseThumbName = $request->file('course_thumb') . '.' . $request->file('course_thumb')->guessExtension();
                $courseThumbPath = $request->file('course_thumb')->storeAs('/course/' . $request->course_name, $courseThumbName);
                $courseThumb = Storage::url($courseThumbPath);
            }

            if ($request->hasFile('course_video')) {
                $courseVideoName = $request->file('course_video') . '.' . $request->file('course_video')->guessExtension();
                $courseVideoPath = $request->file('course_video')->storeAs('/course/' . $request->course_name, $courseVideoName);
                $courseVideo = Storage::url($courseVideoPath);
            }

            $course = Course::create([
                'title'                     => $request->title,
                'slug'                      => Str::slug($request->title),
                'category_id'               => $request->category_id,
                'course_description'        => $request->course_description,
                'course_duration'           => $request->course_duration,
                'course_price'              => $request->course_price,
                'course_old_price'          => $request->course_old_price,
                'course_credit_info'        => $request->course_credit_info,
                'course_medicine_info'      => $request->course_medicine_info,
                'course_thumb'              => $courseThumb,
                'course_video'              => $courseVideo,
                'advantages'                => $request->advantages,
                'course_program'            => $request->course_program,
                'course_program_pdf'        => $request->course_program_pdf,
                'course_contract_url'       => $request->course_contract_url,
                'limit_users'               => $request->limit_users,
                'course_type'               => $request->course_type
            ]);
            
            return $this->onSuccess($course, 'Курс успешно добавлен', 201);
        }
        return $this->onError(401, 'У вас нет прав для добавления курса');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return new CourseResource(Course::with('training_schedules')->findOrFail($id));
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
            Borrower::destroy($id);

            return ["message" => "Клиент удален"];
        }
        return $this->onError(401, 'У вас нет прав для удаления клиента');
    }
}
