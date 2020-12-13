<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Upload;

class TestController extends Controller
{
    //
    public function fileUpload()
    {
        $upload = Upload::get();
        return view('fileupload.index',['upload' => $upload]);
    }

    public function fileUploadProcess(Request $request)
    {
        $this->validate($request, [
			'file' => 'required',
        ]);
        
        // save file
		$file = $request->file('file');
 
        // file name
        $fileName = $file->getClientOriginalName();

        // file extension
        $fileExtension = $file->getClientOriginalExtension();
        if($fileExtension != 'csv'){
            return redirect()->back()->with(['error' => 'Only Csv file allowed']);
        }
        // file size
        $fileSize = $file->getSize();

        // real path
        $filePath = $file->getRealPath();

        $datas = ['fileName'=>$fileName,'filePath'=>$filePath,'fileSize'=>$fileSize, 'fileExtension'=>$fileExtension];

            if($datas!==null){
                // upload file
                $request->file->move('files',$fileName);

                Upload::create([
                    'fileName' => $fileName,
                    'filePath' => $filePath,
                    'fileSize' => $fileSize,
                    'fileExtension' => $fileExtension,
                ]);
                return redirect()->back()->with('datas',$datas)->with(['success' => 'Successfully Uploaded']);
            }else{
                return redirect()->back();
            }

     
        }

        public function mouseOver()
        {
            return view('mouseover.index');
        }

        public function mouseOverResult(Request $request)
        {
            $result = $request->data;
            return view('mouseover.result')->with('result',$result);
        }
        public function advancedTable()
        {
            return view('advancedtable.index');
        }

        public function multiArray()
        {
            
            $data = array(
                array(
                "Order 1",
                array( ["Ingredient A", 1], ["Ingredient Y", 20],[ "Ingredient B", 7],[ "Ingredient X", 3] ),
                ),
                array(
                "Order 2",
                array( [ "Ingredient C", 6],[ "Ingredient F", 25], ["Ingredient G", 6],[ "Ingredient J", 12], ["Ingredient K", 8] )
                ),
                array(
                "Order 3",
                array(  ["Ingredient Z", 17], ["Ingredient M" , 14], ["Ingredient W" ,66 ])
                )
            );
            return view('multiarray.index',["data"=>$data]);
        }

        public function optimizeQuery()
        {
            return view('optimize.index');
        }

         /* display all data */
    public function recordsShowAll(Request $request)
    {

        $limit=10;
        $start=$request->input('start')*$limit;
        if($request->input('search.value'))
            {
                $search=$request->input('search.value');
            }
        else
            {
                $search='';
            }
        $results = DB::select("CALL GetRecordsAll(?,?,?)",[$start,$limit,$search] );
        $counter_listing=DB::table('records')->count();
        $counter_filter=ceil($counter_listing/$limit);
        return response()->json(["data"=>$results,"draw"=>$request->input('draw'),"recordsTotal"=>$counter_listing,"recordsFiltered"=>$counter_filter]);
    }


}
