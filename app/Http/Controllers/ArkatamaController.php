<?php

namespace App\Http\Controllers;

use App\Models\Arkatama;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArkatamaController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function processInput(Request $request)
    {
        $inputData = $request->input('data');
        list($name, $age, $city) = $this->processData($inputData);

        $age = (int)$age;
        Arkatama::create([
            'name' => strtoupper($name),
            'age' => $age,
            'city' => $city
        ]);

        $data = Arkatama::all();

        return redirect()->route('show.data');
    }

    public function showData()
    {
        $data = Arkatama::orderBy('created_at', 'desc')->get();

        return view('result', ['data' => $data]);
    }

    private function processData($inputData)
    {
        preg_match('/(.*?)(\d+)(.*)/', $inputData, $data);
    
        [$text, $name, $age, $city] = $data;
    
        $name = trim($name);
        $age = trim($age);
        $city = strtoupper(trim(preg_replace('/THN|TH|TAHUN/', '', $city)));
    
        return [$name, $age, $city];
    }
}
