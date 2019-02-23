<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\model\Admin;
use App\model\auther;
use App\model\Book;
use App\model\BookAuthor;
use App\model\BookCategory;
use App\model\BookISBN;
use App\model\BookStudent;
use App\model\category;
use App\model\Fine;
use App\model\history;
use App\model\IssueBook;
use App\model\Setting;
use App\model\student;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
use function PhpParser\filesInDir;
use Symfony\Component\CssSelector\Tests\Parser\ReaderTest;

class BackendController extends Controller
{
    private $_view = 'backend.pages';

    function index()
    {
        $data['BookItem'] = Book::all();
        $data['CategoryItem'] = category::all();
        $data['AuthorItem'] = auther::all();
        $data['IssueItem'] = IssueBook::all();
        $data['StudentItem'] = student::all();
        $data['AdminItem'] = Admin::all();
        $data['history'] = history::all();

        return view($this->_view . '.dashboard', $data);
    }

    function view()
    {
        return view('backend.master');
    }

    function addBook()
    {
        $data['category'] = category::where(['status' => 1])->get();
        $data['auther'] = auther::where(['status' => 1])->get();
        $data['isbn'] = BookISBN::all();
        return view($this->_view . '.addBook', $data);
    }

    function addCategory()
    {
        return view($this->_view . '.addCategory');
    }

    function addAuther()
    {
        return view($this->_view . '.addAuther');
    }


    function issueBook()
    {
        return view($this->_view . '.issueBook');
    }


    function issueBookCheck(Request $request)
    {

        $bookId = (int)$request->book_id;
        $studentId = (int)$request->student_id;

        if ($bookIds = Book::find($bookId)) {
            if ($studentIds = student::find($studentId)) {
                $check = IssueBook::where(['student_id' => $studentId])->get() ?? [];
                if (isset($check[0])) {
                    return redirect()->back()->with('fail', 'Book not returned');
                }
                $data = [
                    'date' => $request->date,
                    'book_id' => $request->book_id,
                    'student_id' => $request->student_id

                ];
                if ($bookIds->no_of_books === 0) {
                    return redirect()->back()->with('fail', 'no Books in stock');
                }
                $bookIds->no_of_books--;
                $bookIds->save();


                if (IssueBook::create($data)) {

                    return redirect()->back()->with('success', 'Book Issued');
                }


            }
            return redirect()->back()->with('fail', 'Invalid Student ID');

        }
        return redirect()->back()->with('fail', 'Invalid Book ID');

    }

    function insertBook(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'no_of_books' => 'required',
        ]);

        $data = [
            'title' => $validated['title'],
            'detail' => $validated['detail'],
            'no_of_books' => $validated['no_of_books'],
        ];
        $categories = $request->categories;
        if ($book = Book::create($data)) {
            $bookId = $book->id;
            $count = 0;
            foreach ($categories as $category) {
                $item = [
                    'categories_id' => $category,
                    'books_id' => $bookId
                ];
                $count++;
                BookCategory::create($item);

            }

            $autherItem = [
                'book_id' => $bookId,
                'auther_id' => $request->authers
            ];
            BookAuthor::create($autherItem);
            $noOfBook = $book->no_of_books;
            for ($i = 0; $i < $noOfBook; $i++) {
                $name = date('Yis', time()) . sprintf("%04d", ($bookId + $i));
                $isbnItem = [
                    'book_id' => $bookId,
                    'isbn' => $name
                ];
                BookISBN::create($isbnItem);
            }
            $isbnData['Data'] = BookISBN::where(['book_id' => $bookId])->get() ?? [];
            return view($this->_view . '.printIsbn', $isbnData);
//            return redirect()->back()->with('success', 'Book Added Successfully of ' . $count . ' category');
        }
        return redirect()->back()->with('fail', 'fail');

    }

    function insertAuther(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|unique:authers,name',
            'status' => 'required'
        ]);

        $data = [
            'name' => $validation['name'],
            'status' => $validation['status']
        ];
        if (auther::create($data)) {
            return redirect()->back()->with('success', 'Inserted New Auther');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

    function insertCategory(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|min:3|unique:categories,title',
            'status' => 'required'
        ]);
        $data = [
            'title' => $validated['title'],
            'status' => $validated['status']
        ];
        if (category::create($data)) {
            return redirect()->back()->with('success', 'Inserted New category');
        }
        return redirect()->back()->with('fail', 'fail');
    }


    function manageAuther()
    {
        $data['item'] = auther::all();
        return view('backend.pages.manageAuther', $data);
    }

    function manageCategory()
    {
        $data['item'] = category::paginate(5);
        return view('backend.pages.manageCategory', $data);
    }

    function manageBook()
    {
        $data['item'] = Book::paginate(5);
        return view('backend.pages.manageBook', $data);
    }

    function manageIssue()
    {
        $data['item'] = IssueBook::all();
        return view('backend.pages.manageIssue', $data);
    }


//    delete

    function deleteCategory($id)
    {
        category::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted');

    }

//    category status
    function categoryStatus(Request $request)
    {
        $id = (int)$request->id;

        $data = category::find($id);


        if (isset($request->_enable)) {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();
        return redirect()->back();

    }


//    author status
    function autherStatus(Request $request)
    {
        $id = (int)$request->id;
        $auther = auther::find($id);
        if (isset($request->_enable)) {
            $auther->status = 1;
        } else {
            $auther->status = 0;
        }
        $auther->save();
        return redirect()->back();
    }


//      history
    function history(Request $request)
    {
        $data['studentName'] = $request->studentName;
        $data['bookTitle'] = $request->bookTitle;
        $data['createdAt'] = $request->createdAt;
        $data['date'] = $request->date;

        if (history::create($data)) {
            $id = (int)$request->id;
            $noOfBook = Book::where(['title' => $data['bookTitle']])->first() ?? [];
            $noOfBook->no_of_books++;
            $noOfBook->save();
            IssueBook::findorfail($id)->delete();


            return redirect()->back()->with('success', 'Book Returned');
        }
        return redirect()->back()->with('fail', 'failed');
    }

    function historyList()
    {
        $data['item'] = history::all();
        return view($this->_view . '.history', $data);
    }


//    function checkStudent(Request $request)
//    {
//        if (empty($request->student_id)) {
//            return response()->json(['status' => false]);
//        }
//        $data = student::find($request->student_id);
//        if (empty($data)) {
//            return response()->json(['status' => false]);
//        }
//        return response()->json(['status' => true, 'name' => $data]);
//    }

    function historySearch(Request $request)
    {
        $id = $request->finder;
        if (is_numeric($id)) {
            if ($student = student::find($id)) {
                $name = $student->username;
                $historyName['item'] = history::where(['studentName' => $name])->get() ?? [];
                return view($this->_view . '.historySearch', $historyName);
            }
            return redirect()->back()->with('fail', 'Invalid Student ID');

        }
        return redirect()->back()->with('fail', 'ID only');
    }

    public function setting()
    {
        $data['item'] = Setting::find(1);
        return view($this->_view . '.setting', $data);
    }

    public function dashIssue(Request $request)
    {

        $this->validate($request, [
            'student_id' => 'required',
            'isbn' => 'required|numeric'
        ]);


        $bookIsbn = (int)$request->isbn;
        $studentId = (int)$request->student_id;
        $setting = Setting::where(['id' => 1])->first();
        $returnDate = date('Y-m-d', strtotime($setting['returnTime']));

        $dataIsbn = BookISBN::where(['isbn' => $bookIsbn])->first() ?? [0];

        if ($dataIsbn === [0]) {
            return redirect()->back()->with('fail', 'Invalid Book ID');
        } else {
            if ($studentIds = student::find($studentId)) {
                $bookIds = Book::find($dataIsbn->book_id);
                $check = IssueBook::where(['student_id' => $studentId])->get() ?? [];
                $count = 0;
                foreach ($check as $value) {
                    $count++;
                };
                if ($count === $setting['noOfIssue']) {
                    return redirect()->back()->with('fail', 'Book not returned');
                }

                $sameBook = IssueBook::where(['student_id' => $studentId])->first() ?? 1;
                if ($sameBook === 1) {
                    $data = [
                        'date' => $returnDate,
                        'book_id' => $dataIsbn->getBookName->id,
                        'student_id' => $studentId

                    ];
                    if ($bookIds->no_of_books === 0) {
                        return redirect()->back()->with('fail', 'no Books in stock');
                    }
                    $bookIds->no_of_books--;
                    $bookIds->save();

                    $data['isbn_code'] = $dataIsbn['id'];


                    if (IssueBook::create($data)) {

                        return redirect()->back()->with('success', 'Book Issued');
                    }

                }
                if ($dataIsbn->id === $sameBook->isbn_code) {
                    return redirect()->back()->with('fail', 'Same Book');
                }


            }
            return redirect()->back()->with('fail', 'Invalid Student ID');
        }


    }

    public function dashReturn(Request $request)
    {

        $data = $request->all();
        $isbnData = BookISBN::where(['isbn' => $data['isbn']])->first() ?? [];
        $bookData = Book::where(['id' => $isbnData['book_id']])->first() ?? [];
        $issueData = IssueBook::where(['isbn_code' => $isbnData['id']])->first() ?? [];
        $studentData = student::where(['id' => $issueData['student_id']])->first() ?? [];
        $datas['studentName'] = $studentData['username'];
        $datas['bookTitle'] = $bookData['title'];
        $datas['createdAt'] = $issueData['created_at'];
        $datas['date'] = $issueData['date'];


        if (history::create($datas)) {

            $bookData->no_of_books++;
            $bookData->save();
            IssueBook::findorfail($issueData['id'])->delete();

            return redirect()->back()->with('success', 'Book Returned');
        }
        return redirect()->back()->with('fail', 'failed');
    }


    public function settingAction(Request $request)
    {
        $this->validate($request, [
            'noOfIssue' => 'required|numeric',
            'fineAmount' => 'required|numeric',
        ]);
        $data['noOfIssue'] = $request->noOfIssue;
        $data['fineAmount'] = $request->fineAmount;
        $data['returnTime'] = $request->returnTime;
        if (Setting::find(1)->update($data)) {
            return redirect()->back()->with('success', 'Setting Updated');
        }
        return redirect()->back()->with('fail', 'fail');

    }


    public function cEdit($id)
    {
        $data['item'] = category::find($id);
        return view($this->_view . '.updateCategory', $data);
    }


    public function editAction(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories,title'
        ]);
        $id = $request->id;

        $data['title'] = $request->title;
        $data['status'] = $request->status;

        if (category::find($id)->update($data)) {
            return redirect()->to('/@admin@/manageCategory')->with('success', 'Edited');
        }
        return redirect()->to('/@admin@/manageCategory')->with('fail', 'Failed');
    }

    public function deleteAuther($id)
    {
        auther::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }

    public function editAuther($id)
    {
        $data['item'] = auther::find($id);
        return view($this->_view . '.updateAuther', $data);
    }

    public function editAutherAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        $id = $request->id;
        if (auther::find($id)->update($data)) {
            return redirect()->to('/@admin@/manageAuther')->with('success', 'Edited');
        }
        return redirect()->to('/@admin@/manageAuther')->with('fail', 'failed');
    }

    public function deleteBook($id)
    {
        Book::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted');
    }


}
