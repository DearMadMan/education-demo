<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\SystemMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Input;

class ReportController extends Controller
{

    public function __construct ()
    {
        $this->middleware ('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index ()
    {
        $reports = Report::simplePaginate (10);

        return view ('admin.reportList')
            ->with ('reports' , $reports);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        $report = new Report();
        $report->user_id=1;
        return view ('admin.reportEdit')
            ->with ('report' , $report)
            ->with ('method' , 'post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store ()
    {
        $report = Report::create (Input::all ());
        $report->user_id = Input::get ('user_id');
        $id = $report->save ();

        if ( ! empty($report->reply)) {
            /* Send System message*/
            $sysmsg = new SystemMessage();
            $sysmsg->user_id = Input::get ('user_id');
            $sysmsg->title = 'Reply for Report';
            $sysmsg->content = $report->reply;
            $sysmsg->save ();
        }

        return redirect ('admin/report/' . $report->id)
            ->with ('tips' , 'create new report success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show ($id)
    {
        $report = Report::find ($id);

        return view ('admin.reportSingle')
            ->with ('report' , $report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit ($id)
    {
        $report = Report::find ($id);

        return view ('admin.reportEdit')
            ->with ('report' , $report)
            ->with ('method' , 'put');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update ($id)
    {
        $report = Report::find ($id);
        if(Input::get('reply')!='')
        {
            $report->reply=Input::get('reply');
            $report->save();
            /* Send System message*/
            $sysmsg = new SystemMessage();
            $sysmsg->user_id = $report->user_id;
            $sysmsg->title = 'Reply for Report';
            $sysmsg->content = $report->reply;
            $sysmsg->save ();
        }

        return redirect('admin/report/'.$id)
            ->with('tips','Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy ($id)
    {
        Report::destroy($id);
        return redirect('admin/report')
            ->with('tips','Delete report success');
    }

}
