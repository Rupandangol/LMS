<?php

namespace App\Http\Controllers;

use App\model\Book;
use App\model\BookISBN;
use App\model\IssueBook;
use App\model\Setting;
use App\model\student;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    function checkStudent(Request $request)
    {
        $id = $request->student_id;

        $name = student::find($id);
        if ($name) {
            $data['status'] = true;
            $data['student'] = $name->username;
        } else {
            $data['status'] = false;

        }
        return response()->json($data);
    }


    function checkBook(Request $request)
    {
        $id = $request->book_id;
        $name = BookISBN::where(['isbn' => $id])->first()->book_id ?? false;
        if ($name) {
            $data['book'] = Book::find($name)->title;
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        return response()->json($data);

    }

    function fine(Request $request)
    {
        $isbnData = BookISBN::where(['isbn' => $request->fine_id])->first();
        $issueData = IssueBook::where(['isbn_code' => $isbnData->id])->first() ?? false;
        $today=date("Y-m-d",time());
        if ($issueData) {
            if($today===$issueData->date||$today<$issueData->date){
            $id['asdfsadf'] = 0;
            }else{
                $id['asdfsadf'] = Setting::find(1)->fineAmount;
            }
            $id['studentName'] = $issueData->getStudent->username;
            $id['bookName'] = $isbnData->getBookName->title;
            $id['status'] = true;
        } else {
            $id['noDataElement'] = 'no Data';
            $id['status'] = false;
        }
        return response()->json($id);
    }

    function status(Request $request){
        return $request->all();
    }

}
