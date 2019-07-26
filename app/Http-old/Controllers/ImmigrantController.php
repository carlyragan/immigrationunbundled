<?php

namespace App\Http\Controllers;

use App\Applicants;
use App\User;
use App\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Validation\Rule;
use App\Mail\GmailExample;
use Illuminate\Support\Facades\Mail;

class ImmigrantController extends Controller {

    public function step1() {
        return view('temp1.immigrant.step1');
    }

    public function savestep1(Request $request) {
        $validator = \Validator::make($request->all(), [
                    'relationship' => ['required', Rule::in(['alone', 'spouse'])],
                    'age' => 'required|numeric|min:1|max:200',
                    'education' => ['required', Rule::in(['a', 'b', 'c', 'd'])],
                    'speaking' => 'required|numeric|min:6|max:7.5',
                    'listening' => 'required|numeric|min:6|max:7.5',
                    'reading' => 'required|numeric|min:6|max:7.5',
                    'writing' => 'required|numeric|min:6|max:7.5',
                    'experience' => ['required', Rule::in(['a', 'c'])],
                    'spouse_education' => [Rule::in(['a', 'b', 'c', 'd'])],
                    'spouse_experience' => [Rule::in(['a', 'c'])],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $applicants = Applicants::where('user_id', Auth::user()->id)->first();

        if (is_null($applicants)) {
            $applicants = new Applicants();
        }

        $applicants->relationship = Input::get('relationship');
        $applicants->user_id = Auth::id();
        $applicants->age = Input::get('age');
        $applicants->education = Input::get('education');
        $applicants->speaking = Input::get('speaking');
        $applicants->listening = Input::get('listening');
        $applicants->reading = Input::get('reading');
        $applicants->writing = Input::get('writing');
        $applicants->experience = Input::get('experience');
        if ($applicants->relationship == 'spouse') {
            $applicants->spouse_education = Input::get('spouse_education', '');
            $applicants->spouse_experience = Input::get('spouse_experience', '');
        } else {
            $applicants->spouse_education = '';
            $applicants->spouse_experience = '';
        }
        $applicants->steps = 1;
        $applicants->save();
        return redirect()->route('immigrant.step2');
    }

    public function step2() {
        $user = Auth::user();
        $applicant = Applicants::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $this->setSteps($applicant->steps, $user->id, 2);

        return view('temp1.immigrant.step2', ['score' => $applicant->score]);
    }

    public function step3() {

        $applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        /* $checkCurrStep = $this->setSteps($applicant->steps,Auth::id(),3);
          if ($checkCurrStep == 1) {
          $curr = $applicant->steps+1;
          return redirect()->route('immigrant.step'.$curr);
          } */
        return view('temp1.immigrant.step3', ['score' => $applicant->score]);
    }

    public function step4() {
        return view('temp1.immigrant.step4');
    }

    public function saveUploads(Request $request) {
        $uploads = new Uploads();
        $validator = \Validator::make($request->all(), [
            'education_credential_assessment' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:3048',
                    'ielts' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:3048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $uploads->user_id = Auth::id();
        if ($request->hasFile('education_credential_assessment')) {
            $uploads->education_credential_assessment = $request->file('education_credential_assessment')->store('temp1/files/uploads');
            $uploads->ielts = $request->file('ielts')->store('temp1/files/uploads');
        }
        $uploads->save();
        $email = Auth::user()->email;
        $subject = 'Submitted documents';
        $message = Auth::user()->name . ' has submitted his/her document';
        Mail::to('carlyrags@gmail.com')->send(new GmailExample($subject, $message));
        Mail::to('ali.yousaf207@gmail.com')->send(new GmailExample($subject, $message));
        return redirect()->route('immigrant.step5');
    }

    public function calendy() {
        return view('temp1.immigrant.calendy');
    }

    public function step5() {
        return view('temp1.immigrant.step5');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('temp1.immigrant.create');
    }

    public function login() {
        return view('temp1.immigrant.login');
    }

    public function recalc(Request $request) {

        $applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        $applicant->speaking = 7;
        $applicant->reading = 7;
        $applicant->writing = 7;
        $applicant->listening = 8;

        return view('temp1.immigrant.step3', [
            'score' => $applicant->score,
            'recalc' => 'Retake Ielts'
        ]);
    }

    public function setSteps($step, $userId, $currStep) {
        $applicant = Applicants::where('user_id', $userId)->orderBy('id', 'desc')->first();
        $currentStep = $applicant->steps + 1;
        if ($currentStep != $currStep) {
            return 1;
        } else {
            return 0;
        }
    }

}
