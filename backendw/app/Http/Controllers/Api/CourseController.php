<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        // if ($this->isAdmin($request->user()) || $this->isManager($request->user())) {
            $validator = Validator::make(
                $request->all(),
                [
                    'title'              => ['required'],
                    'description'        => ['required'],
                    'duration'           => ['required'],
                    'price'              => ['required'],
                    'credit_info'        => ['required'],
                    'medicine_info'      => ['required'],
                    'advantages'         => ['required'],
                    'program'            => ['required'],
                    'limit_users'        => ['required'],
                    'type'               => ['required']
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
                $courseThumbPath = $request->file('course_thumb')->storeAs('/course/' . $request->title, $courseThumbName);
                $courseThumb = Storage::url($courseThumbPath);
            }

            if ($request->hasFile('course_video')) {
                $courseVideoName = $request->file('course_video') . '.' . $request->file('course_video')->guessExtension();
                $courseVideoPath = $request->file('course_video')->storeAs('/course/' . $request->title, $courseVideoName);
                $courseVideo = Storage::url($courseVideoPath);
            }

            $course = Course::create([
                'title'              => $request->title,
                'slug'               => SlugService::createSlug(Course::class, 'slug', $request->title),
                'category_id'        => $request->category_id,
                'description'        => $request->description,
                'duration'           => $request->duration,
                'price'              => $request->price,
                'old_price'          => $request->old_price,
                'credit_info'        => $request->credit_info,
                'medicine_info'      => $request->medicine_info,
                'thumb'              => $courseThumb,
                'video'              => $request->video,
                'advantages'         => $request->advantages,
                'program'            => $request->program,
                'program_pdf'        => $request->program_pdf,
                'contract_url'       => $request->contract_url,
                'limit_users'        => $request->limit_users,
                'type'               => $request->type
            ]);
            
            return $this->onSuccess($course, 'Курс успешно добавлен', 201);
        // }
        // return $this->onError(401, 'У вас нет прав для добавления курса');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return new CourseResource(Course::where('slug', '=', $slug)->firstOrFail());
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
            // $coursePhotoName = 'thumb.' . $request->file('thumb')->guessExtension();
            // $coursePhotoPath = $request->file('thumb')->move(public_path() . '/uploads/' . $request->title . '_' . $request->category_id, $coursePhotoName);
            // $coursePhotoUrl = url($coursePhotoPath);
            
            $course                     = Course::find($id);
            $course->title              = $request->title;
            $course->slug               = SlugService::createSlug(Course::class, 'slug', $request->title);
            $course->category_id        = $request->category_id;
            $course->description        = $request->description;
            $course->duration           = $request->duration;
            $course->price              = $request->price;
            $course->old_price          = $request->old_price;
            $course->credit_info        = $request->credit_info;
            $course->medicine_info      = $request->medicine_info;
            $course->thumb              = $courseThumb;
            $course->video              = $request->video;
            $course->advantages         = $request->advantages;
            $course->program            = $request->program;
            $course->program_pdf        = $request->program_pdf;
            $course->contract_url       = $request->contract_url;
            $course->limit_users        = $request->limit_users;
            $course->type               = $request->type;
            $course->save();

            return [
                "message" => "Курс успешно изменен"
            ];
        }
        return $this->onError(401, 'У вас нет прав для изменения курса');
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

            return ["message" => "Курс успешно удален"];
        }
        return $this->onError(401, 'У вас нет прав для удаления курса');
    }
}
