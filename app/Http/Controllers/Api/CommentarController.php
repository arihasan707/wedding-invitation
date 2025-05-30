<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commentar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

use function PHPUnit\Framework\isEmpty;

class CommentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cek = Commentar::all();
        if (!empty($cek)) {
            $data = Commentar::OrderBy('created_at', 'desc')
                ->paginate(5);
        }
        return response()->json([
            'status' => true,
            'message' => 'tampil data',
            'data' => $data
        ], 200);
    }

    public function loadMore(Request $request)
    {
        $start = $request->start;

        $data = Commentar::orderBy('created_at', 'desc')
            ->offset($start)
            ->limit(5)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 5
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Commentar();
        $date = Carbon::now();

        $comment->nama = $request->nama;
        $comment->text = $request->text;
        $comment->dibuat = date_format($date, 'd-M-Y, H:i');

        $comment->save();

        return response()->json([
            'status' => true,
            'massage' => 'data ditambahkan',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
