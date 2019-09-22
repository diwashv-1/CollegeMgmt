<?php

namespace College\Http\Controllers\teacher;

use Carbon\Carbon;
use College\Attendance;
use College\Subject;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{
    //

    public function fetchStudent(Request $request)
    {
        $subject = Subject::find($request->id);

        $student = DB::table('students')
            ->join('semesters', 'students.id', '=', 'semesters.student_id')
            ->where('students.course_id', $subject->course_id)
            ->where('semesters.semester', $subject->semester)
            ->select('students.studentName', 'students.studentCode', 'semesters.student_id')
            ->get();

        return response()->json([
            'msg' => 'ok',
            'students' => $student,
        ], 200);
    }

    public function saveAttendance(Request $request)
    {
        $date = Carbon::now('Asia/Kathmandu')->format('Y-m-d');
        $subId = $request->subId;
        $month = Carbon::now('Asia/Kathmandu')->format('Y-m');
        $attendance = Attendance::select('date')->where('subject_id', $subId)->latest('date')->first();

        if($attendance){
        if ($date !== $attendance->date) {
            if (!empty($request->studentPresent)) {
                $this->presentSave($request->studentPresent, $date, $subId, $month);
            }
            if (!empty($request->studentAbsent)) {
                $this->presentSave($request->studentAbsent, $date, $subId, $month);
            }
            return response()->json([
                'msg' => 'success'
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Sorry !! The Attendance is already held'
            ], 200);
        }
    }
        else{
            if (!empty($request->studentPresent)) {
                $this->presentSave($request->studentPresent, $date, $subId, $month);
            }

            if (!empty($request->studentAbsent)) {

                $this->absentSave($request->studentAbsent, $date, $subId, $month);
            }
            return response()->json([
                'msg' => 'success'
            ], 200);
        }
    }
            public function presentSave($data, $date, $subId, $month){
                foreach ($data as $key => $value) {
                    $std_id = $value['std_id'];
                    Attendance::create([
                        'student_id' => $std_id,
                        'isPresent' => 1,
                        'subject_id' => $subId,
                        'remarks' => '',
                        'date' => $date,
                        'month'=> $month,
                    ]);
                }
                return true;
            }


            public function absentSave($data, $date, $subId, $month){
                foreach ($data as $key => $value) {
                    $std_id = $value['std_id'];
                    Attendance::create([
                        'student_id' => $std_id,
                        'isPresent' => 0,
                        'subject_id' => $subId,
                        'remarks' => $value['remarks'],
                        'date' => $date,
                        'month' =>$month,
                    ]);
                }
            }
}
