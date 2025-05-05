<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('bookmark');
    }

    public function showBookmarks()
    {
        // Data dummy sementara
        $dummyBookmark = [
            [
                'items' => [
                    [
                        'id' => 1,
                        'keyword' => 'Dipyo',
                        'pronunciation' => '/dip-yo/',
                        'definition' => 'Bis Universitas Diponegoro yang disediakan oleh kampus untuk mahasiswa.',
                        'is_bookmarked' => false,
                        'sub_items' => []
                    ],
                    [
                        'id' => 2,
                        'keyword' => 'IPS',
                        'pronunciation' => '/i-pe-es/',
                        'definition' => 'Tingkat keberhasilan mahasiswa...',
                        'is_bookmarked' => true,
                        'sub_items' => []
                    ],
                    [
                        'id' => 3,
                        'keyword' => 'KTM',
                        'pronunciation' => '/ka-te-em/',
                        'definition' => 'Kegiatan kurikuler di masyarakat',
                        'is_bookmarked' => false,
                        'sub_items' => []
                    ]
                ]
            ]
        ];

        // Passing dummyBookmark ke view
        return view('bookmark', ['dummyBookmark' => $dummyBookmark]);
    }

}

