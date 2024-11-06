<?php

namespace App\Http\Controllers;

use App\Models\AppointmentDoctor;
use App\Models\AssessmentDoctor;
use App\Models\AssessmentQuestion;
use App\Models\PatientAssessment;
use App\Models\Assessment;
use App\Models\Appointment;
use App\Models\Question;
use App\Models\Doctor;
use App\Models\PatientAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $answers = AssessmentQuestion::all();
        if (Auth::guard('web')->check()) {
            $assessments = Assessment::where('is_finished', 1)->whereHas('patients', function ($query) {
                $query->where('patient_id', Auth::user()->id);
            })->paginate(10);

            $takenAssessment = Assessment::where('is_finished', 0)->whereHas('patients', function ($query) {
                $query->where('patient_id', Auth::user()->id);
            })->first();

            return view('assessment.index', compact('questions', 'answers', 'assessments', 'takenAssessment'));
        }
        else if (Auth::guard('doctors')->check()) {
            $assessments = Assessment::where('is_finished', 1)->whereHas('doctors', function ($query) {
                $query->where('doctor_id', Auth::guard('doctors')->user()->id);
            })->paginate(10);
        }
        else if (Auth::guard('admins')->check()) {
            $assessments = Assessment::where('is_finished', 1)->paginate(10);
        }

        return view('assessment.index', compact('questions', 'answers', 'assessments'));
    }

    public function start()
    {
        $takenAssessment = Assessment::where('is_finished', 0)->whereHas('patients', function ($query) {
            $query->where('patient_id', Auth::user()->id);
        })->first();
        
        if ($takenAssessment){
            $lastQuestionId = Question::whereHas('assessments', function ($query) use ($takenAssessment) {
                $query->where('assessment_id', $takenAssessment->id);
            })->max('id');
            
            if ($lastQuestionId){
                return redirect('assessment/question/' . $lastQuestionId);
            }
            else {
                $question = Question::first();
                return redirect('assessment/question/' . $question->id);
            }
        }

        $assessment = Assessment::create([
            'datetime' => date('Y-m-d H:i:s'),
            'status' => null,
            'is_verified' => 0,
            'is_finished' => 0,
            'notes' => null,
            'admin_id' => null
        ]);

        PatientAssessment::create([
            'patient_id' => Auth::user()->id,
            'assessment_id' => $assessment->id
        ]);

        $question = Question::first();
        return redirect('assessment/question/' . $question->id);
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);
        return view('assessment.question', compact('question'));
    }

    public function answer(Request $request)
    {
        $request->validate(
            [
                'answer' => 'required'
            ],
            [
                'answer.required' => 'Answer can\'t be empty!'
            ]
        );
        $assessment = Assessment::where('is_finished', 0)->whereHas('patients', function ($query) {
            $query->where('patient_id', Auth::user()->id);
        })->first();

        $answer = AssessmentQuestion::where('assessment_id', $assessment->id)->where('question_id', $request->id)->first();

        if ($answer){
            AssessmentQuestion::findOrFail($answer->id)->update([
                'assessment_id' => $assessment->id,
                'question_id' => $request->id,
                'answer' => $request->answer,
            ]);
        }
        else {
            AssessmentQuestion::create([
                'assessment_id' => $assessment->id,
                'question_id' => $request->id,
                'answer' => $request->answer,
            ]);
        }

        $nextQuestionId = Question::where('id', '>', $request->id)->min('id');
        $prevQuestionId = Question::where('id', '<', $request->id)->max('id');
    
        if ($request->submit_button === 'prev' && $prevQuestionId) {
            return redirect('assessment/question/' . $prevQuestionId);
        } elseif ($request->submit_button === 'next' && $nextQuestionId) {
            return redirect('assessment/question/' . $nextQuestionId);
        } else {
            return redirect('assessment/notes');
        }
    }

    public function notes()
    {
        $doctors = Doctor::all();
        return view('assessment.notes', compact('doctors'));
    }

    public function finish(Request $request)
    {
        $request->validate(
            [
                'doctor' => 'gt:0'
            ],
            [
                'doctor.gt' => 'Doctor can\'t be empty!'
            ]
        );

        $assessment = Assessment::where('is_finished', 0)->whereHas('patients', function ($query) {
            $query->where('patient_id', Auth::user()->id);
        })->first();
        
        if ($assessment){
            if ($request->notes){
                Assessment::findOrFail($assessment->id)->update([
                    'is_finished' => 1,
                    'notes' => $request->notes
                ]);
            }
            else{
                Assessment::findOrFail($assessment->id)->update([
                    'is_finished' => 1
                ]);
            }
            
            AssessmentDoctor::create([
                'assessment_id' => $assessment->id,
                'doctor_id' => $request->doctor
            ]);

            $appointment = Appointment::create([
                'datetime' => $request->datetime,
                'status' => 'waiting'
            ]);

            PatientAppointment::create([
                'patient_id' => Auth::guard('web')->user()->id,
                'appointment_id' => $appointment->id
            ]);

            AppointmentDoctor::create([
                'appointment_id' => $appointment->id,
                'doctor_id' => $request->doctor
            ]);
        }

        return redirect('assessment');
    }

    public function destroy(Request $request)
    {
        Assessment::findOrFail($request->id)->delete();
        return redirect('assessment');
    }

    public function getAnswer(Request $request)
    {
        $assessmentId = $request->input('assessment_id');
        $questionId = $request->input('question_id');

        $answer = AssessmentQuestion::where('assessment_id', $assessmentId)
            ->where('question_id', $questionId)
            ->value('answer');

        return response()->json(['answer' => $answer]);
    }

    public function getNotes(Request $request)
    {
        $assessmentId = $request->input('assessment_id');

        $notes = Assessment::where('id', $assessmentId)->value('notes');

        return response()->json(['notes' => $notes]);
    }

    public function verify(Request $request)
    {
        $request->validate(
            [
                'status' => 'not_in:null'
            ],
            [
                'status.not_in' => 'Status can\'t be empty!'
            ]
        );

        Assessment::findOrFail($request->assessment_id)->update([
            'status' => $request->status,
            'is_verified' => 1
        ]);

        return redirect('assessment');
    }
}
