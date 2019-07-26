<?php

namespace App\Http\Controllers;

use App\Applicants;
use App\Mail\GmailExample;
use App\Uploads;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

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
		$applicants->next_step = 2;
		$applicants->save();
		return redirect()->route('immigrant.step2');
	}

	public function step2() {
		$user = Auth::user();
        $applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $checkCurrStep = $this->setSteps(2);
        $complteStep = $applicant->next_step+1;
        $backStep = $complteStep-1;
        if($checkCurrStep == false){
            return redirect()->route('immigrant.step' . $backStep);
        }
        if(2 > $applicant->next_step){
            $applicant->next_step = 2;
            $applicant->save();
        }

		return view('temp1.immigrant.step2', ['score' => $applicant->score,'steps'=> $applicant->next_step]);
	}

	public function step3() {

		$applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $checkCurrStep = $this->setSteps(3);
        $complteStep = $applicant->next_step+1;
        $backStep = $complteStep-1;
        if($checkCurrStep == false){
            return redirect()->route('immigrant.step' . $backStep);
        }
        if(3 > $applicant->next_step){
            $applicant->next_step = 3;
            $applicant->save();
        }

		return view('temp1.immigrant.step3', ['score' => $applicant->score ,'steps'=> $applicant->next_step]);
	}

	public function step4() {
		$applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $checkCurrStep = $this->setSteps(4);
        $complteStep = $applicant->next_step+1;
        $backStep = $complteStep-1;
        if($checkCurrStep == false){
            return redirect()->route('immigrant.step' . $backStep);
        }
        if(4 > $applicant->next_step){
            $applicant->next_step = 4;
            $applicant->save();
        }
		return view('temp1.immigrant.step4',['steps'=> $applicant->next_step]);
	}

	public function saveUploads(Request $request) {
		$validator = \Validator::make($request->all(), [
			'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:3048',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		$uploads = new Uploads();
		$uploads = $uploads->where('user_id', '=', Auth::id())->first();

		if (empty($uploads)) {
			$uploads = new Uploads();
		}

		$uploads->user_id = Auth::id();
		$uniqueFileName = time() . '.' . request()->file('image')->getClientOriginalExtension();
		$path = request()->file('image')->move(public_path('temp1/files'), $uniqueFileName);
		$uploads->education_credential_assessment = $uniqueFileName;

		$uploads->save();
		$email = Auth::user()->email;
		$subject = 'Submitted documents';
		$message = Auth::user()->name . ' has submitted his/her document';
		Mail::to('carlyrags@gmail.com')->send(new GmailExample($subject, $message));
		Mail::to('ali.yousaf207@gmail.com')->send(new GmailExample($subject, $message));
		return redirect(route('immigrant.step5'))->with(['message' => 'uploaded successfully']);
	}

	public function saveUploads2(Request $request) {

		$validator = \Validator::make($request->all(), [
			'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:3048',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		$uploads = new Uploads();
		$uploads = $uploads->where('user_id', '=', Auth::id())->first();

		if (empty($uploads)) {
			$uploads = new Uploads();
		}

		$uploads->user_id = Auth::id();
		if ($request->hasFile('image')) {
			$uniqueFileName = time() . '.' . request()->file('image')->getClientOriginalExtension();
			$path = request()->file('image')->move(public_path('temp1/files'), $uniqueFileName);

			$uploads->ielts = $uniqueFileName;
		}
		$uploads->save();
		$email = Auth::user()->email;
		$subject = 'Submitted documents';
		$message = Auth::user()->name . ' has submitted his/her document';
		Mail::to('carlyrags@gmail.com')->send(new GmailExample($subject, $message));
		Mail::to('ali.yousaf207@gmail.com')->send(new GmailExample($subject, $message));
		return redirect(route('immigrant.step5'))->with(['message' => 'uploaded successfully']);
	}

	public function calendy() {
		return view('temp1.immigrant.calendy');
	}

	public function step5() {
        $applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $checkCurrStep = $this->setSteps(5);
        $complteStep = $applicant->next_step+1;
        $backStep = $complteStep-1;
        if($checkCurrStep == false){
            return redirect()->route('immigrant.step' . $backStep);
        }
        if(5 > $applicant->next_step){
            $applicant->next_step = 5;
            $applicant->save();
        }
		return view('temp1.immigrant.step5', ['steps'=> $applicant->next_step]);
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
			'recalc' => 'Retake Ielts',
		]);
	}

	public function setSteps($currStep) {
		$applicant = Applicants::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
		$complteStep = $applicant->next_step+1;
        //echo "Curr". $currStep . "DBCurr". $complteStep;exit;
       if ($currStep   <= $complteStep) {
           return true;
		} else {
            return false;
		}
	}

}
