<?php

namespace App\Http\Controllers;

use App\Models\supermarket;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //Get uploaded CSV file
    $file = $request->file('csv');

    //Create list name
    $name = time().'-'.$file->getClientOriginalName();

    //Create a list record in the database
    $list = List::create(['name' => $name]);

    //Create a CSV reader instance
    $reader = Reader::createFromFileObject($file->openFile());

    //Create a customer from each row in the CSV file
    foreach ($reader as $index => $row) {
        $list->customers()->create($row);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function show(supermarket $supermarket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function edit(supermarket $supermarket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supermarket $supermarket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function destroy(supermarket $supermarket)
    {
        //
    }

    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}
public function importCsv()
{
    $file = public_path('file/test.csv');

$customerArr = $this->csvToArray($file);
$date = [];
for ($i = 0; $i < count($customerArr); $i ++)
{
    $data[] = [
      'column_name1' => 'value',
      'column_name2' => 'value2',
      .. so..on..and..on
    ];
    //User::firstOrCreate($customerArr[$i]);
}
DB::table('table_name')->insert($data);
return 'done';    
}
}
