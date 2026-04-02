<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongMaster;
use App\Models\Video;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Readmaterial;
use App\Models\Announcement;
use App\Models\Comment;
use App\Models\MainMenu;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use DB;
use function Pest\Laravel\json;



class HomeController extends Controller
{

    public function indexold(Request $request)
    {
        // =========================
        // COMMON DATE FILTER (optional)
        // =========================
        $fromDate = Carbon::now('Asia/Kolkata')->subDays(30);

        // =========================
        // AUDIO (Grouped by publish_date)
        // =========================
        $audiosQuery = SongMaster::with(['speaker1', 'speaker2', 'category', 'subcategory'])
            ->where('status', 'Yes')
            ->where('ishome', 'Yes')
            ->whereNotNull('publish_date')
            // ->where('publish_date', '>=', $fromDate) // enable if needed
            ->take(50) // limit to recent 50 for performance
            ->orderBy('publish_date', 'DESC');


        // Get paginated results
        $audiosPaginated = $audiosQuery->paginate(20, ['*'], 'audiopage');


        // Group by date for display
        $audiosGrouped = $audiosPaginated->getCollection()->groupBy(function($item) {
            return Carbon::parse($item->publish_date)->format('Y-m-d');
        })->map(function($dateGroup) {
            return [
                'date' => Carbon::parse($dateGroup->first()->publish_date),
                'items' => $dateGroup,
                'count' => $dateGroup->count()
            ];
        });

        // Replace collection with grouped data
        $audiosPaginated->setCollection(collect($audiosGrouped));

        // =========================
        // VIDEO (Grouped by class_date)
        // =========================
        $videosQuery = Video::where('status', 'Yes')
            ->where('ishome', 'Yes')
            ->take(50) // limit to recent 50 for performance
            ->orderBy('class_date', 'DESC');

//        $videosPaginated = $videosQuery->paginate(20, ['*'], 'videopage');
        $videosPaginated = $audiosQuery
            ->latest()
            ->take(50)
            ->paginate(10, ['*'], 'videopage');

        $videosGrouped = $videosPaginated->getCollection()->groupBy(function($item) {
            return Carbon::parse($item->class_date)->format('Y-m-d');
        })->map(function($dateGroup) {
            return [
                'date' => Carbon::parse($dateGroup->first()->class_date),
                'items' => $dateGroup,
                'count' => $dateGroup->count()
            ];
        });

        $videosPaginated->setCollection(collect($videosGrouped));

        // =========================
        // PDF / READING MATERIAL (Grouped by publish_date)
        // =========================
        $pdfsQuery = Readmaterial::where('status', 'Yes')
            ->where('ishome', 'Yes')
            ->take(50) // limit to recent 50 for performance
            ->orderBy('publish_date', 'DESC');

//        $pdfsPaginated = $pdfsQuery->paginate(20, ['*'], 'pdfpage');
        $pdfsPaginated = $audiosQuery
            ->latest()
            ->take(50)
            ->paginate(10, ['*'], 'pdfpage');

        $pdfsGrouped = $pdfsPaginated->getCollection()->groupBy(function($item) {
            return Carbon::parse($item->publish_date)->format('Y-m-d');
        })->map(function($dateGroup) {
            return [
                'date' => Carbon::parse($dateGroup->first()->publish_date),
                'items' => $dateGroup,
                'count' => $dateGroup->count()
            ];
        });

        $pdfsPaginated->setCollection(collect($pdfsGrouped));

        // =========================
        // ANNOUNCEMENTS (Home)
        // =========================
        $announcements = Announcement::where('ishome', 'Yes')
            ->orderBy('date', 'DESC')
            ->limit(10)
            ->get();

        return view('user.index', compact(
            'audiosPaginated',
            'videosPaginated',
            'pdfsPaginated',
            'announcements'
        ));
    }



    public function index(Request $request)
    {
        // =========================
        // COMMON CACHE TIME (1 Minute)
        // =========================
        $cacheTime = 60; // seconds (Adjust karein jaise 300 for 5 mins)

        // =========================
        // AUDIO (Cached & Optimized)
        // =========================
        $audioPage = $request->input('audiopage', 1);

        $audiosPaginated = Cache::remember("audios_home_{$audioPage}", $cacheTime, function () {
            // Eager Loading relations to prevent N+1 queries
            $query = SongMaster::with(['speaker1', 'speaker2', 'category', 'subcategory'])
                ->where('status', 'Yes')
                ->where('ishome', 'Yes')
                ->whereNotNull('publish_date')
                ->take(50) // limit to recent 50 for performance
                ->latest()
                ->limit(50)
                ->orderBy('publish_date', 'DESC');
            // Paginating directly
            $paginated = $query->paginate(10, ['*'], 'audiopage');

            // Grouping logic
            $grouped = $paginated->getCollection()->groupBy(function($item) {
                return Carbon::parse($item->publish_date)->format('Y-m-d');
            })->map(function($dateGroup) {
                return [
                    'date' => Carbon::parse($dateGroup->first()->publish_date),
                    'items' => $dateGroup,
                    'count' => $dateGroup->count()
                ];
            });

            $paginated->setCollection(collect($grouped));
            return $paginated;
        });

        // =========================
        // VIDEO (Cached & Optimized)
        // =========================
        $videoPage = $request->input('videopage', 1);

        $videosPaginated = Cache::remember("videos_home_{$videoPage}", $cacheTime, function () {
            // FIX: Pehle yahan $audiosQuery use ho raha tha, ab sahi $video query hai
            $query = Video::with(['category', 'subcategory']) // Eager load if relations exist
            ->where('status', 'Yes')
                ->where('ishome', 'Yes')
                ->orderBy('class_date', 'DESC');

            $paginated = $query->paginate(10, ['*'], 'videopage');

            $grouped = $paginated->getCollection()->groupBy(function($item) {
                return Carbon::parse($item->class_date)->format('Y-m-d');
            })->map(function($dateGroup) {
                return [
                    'date' => Carbon::parse($dateGroup->first()->class_date),
                    'items' => $dateGroup,
                    'count' => $dateGroup->count()
                ];
            });

            $paginated->setCollection(collect($grouped));
            return $paginated;
        });

        // =========================
        // PDF / READING MATERIAL (Cached & Optimized)
        // =========================
        $pdfPage = $request->input('pdfpage', 1);

        $pdfsPaginated = Cache::remember("pdfs_home_{$pdfPage}", $cacheTime, function () {
            // FIX: Pehle yahan bhi $audiosQuery use ho raha tha
            $query = Readmaterial::where('status', 'Yes')
                ->where('ishome', 'Yes')
                ->orderBy('publish_date', 'DESC');

            $paginated = $query->paginate(10, ['*'], 'pdfpage');

            $grouped = $paginated->getCollection()->groupBy(function($item) {
                return Carbon::parse($item->publish_date)->format('Y-m-d');
            })->map(function($dateGroup) {
                return [
                    'date' => Carbon::parse($dateGroup->first()->publish_date),
                    'items' => $dateGroup,
                    'count' => $dateGroup->count()
                ];
            });

            $paginated->setCollection(collect($grouped));
            return $paginated;
        });

        // =========================
        // ANNOUNCEMENTS (Cached)
        // =========================
        $announcements = Cache::remember('announcements_home', $cacheTime, function () {
            return Announcement::where('ishome', 'Yes')
                ->orderBy('date', 'DESC')
                ->limit(10)
                ->get();
        });

        return view('user.index', compact(
            'audiosPaginated',
            'videosPaginated',
            'pdfsPaginated',
            'announcements'
        ));
    }

    public function index_new2(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AUDIO SECTION
        |--------------------------------------------------------------------------
        */

        $audioPage = $request->get('audiopage', 1);

        $audiosPaginated = Cache::remember(
            'home_audios_page_' . $audioPage,
            300,
            function () {

                return SongMaster::select([
                    'id',
                    'title',
                    'publish_date',
                    'speaker1_id',
                    'speaker2_id',
                    'category_id',
                    'subcategory_id'
                ])
                    ->with([
                        'speaker1',
                        'speaker2',
                        'category',
                        'subcategory'
                    ])
                    ->where('status', 'Yes')
                    ->where('ishome', 'Yes')
                    ->whereNotNull('publish_date')
                    ->orderByDesc('publish_date')
                    ->paginate(10, ['*'], 'audiopage');
            }
        );

        $audiosGrouped = $audiosPaginated->getCollection()
            ->groupBy(fn($item) => Carbon::parse($item->publish_date)->format('Y-m-d'))
            ->map(function ($dateGroup, $date) {
                return [
                    'date'  => Carbon::parse($date),
                    'items' => $dateGroup->values(),
                    'count' => $dateGroup->count(),
                ];
            })
            ->values();

        $audiosPaginated->setCollection($audiosGrouped);



        /*
        |--------------------------------------------------------------------------
        | VIDEO SECTION
        |--------------------------------------------------------------------------
        */

        $videoPage = $request->get('videopage', 1);

        $videosPaginated = Cache::remember(
            'home_videos_page_' . $videoPage,
            300,
            function () {

                return Video::select([
                    'id',
                    'title',
                    'class_date'
                ])
                    ->where('status', 'Yes')
                    ->where('ishome', 'Yes')
                    ->whereNotNull('class_date')
                    ->orderByDesc('class_date')
                    ->paginate(10, ['*'], 'videopage');
            }
        );

        $videosGrouped = $videosPaginated->getCollection()
            ->groupBy(fn($item) => Carbon::parse($item->class_date)->format('Y-m-d'))
            ->map(function ($dateGroup, $date) {
                return [
                    'date'  => Carbon::parse($date),
                    'items' => $dateGroup->values(),
                    'count' => $dateGroup->count(),
                ];
            })
            ->values();

        $videosPaginated->setCollection($videosGrouped);



        /*
        |--------------------------------------------------------------------------
        | PDF / READING MATERIAL SECTION
        |--------------------------------------------------------------------------
        */

        $pdfPage = $request->get('pdfpage', 1);

        $pdfsPaginated = Cache::remember(
            'home_pdfs_page_' . $pdfPage,
            300,
            function () {

                return Readmaterial::select([
                    'id',
                    'title',
                    'publish_date'
                ])
                    ->where('status', 'Yes')
                    ->where('ishome', 'Yes')
                    ->whereNotNull('publish_date')
                    ->orderByDesc('publish_date')
                    ->paginate(10, ['*'], 'pdfpage');
            }
        );

        $pdfsGrouped = $pdfsPaginated->getCollection()
            ->groupBy(fn($item) => Carbon::parse($item->publish_date)->format('Y-m-d'))
            ->map(function ($dateGroup, $date) {
                return [
                    'date'  => Carbon::parse($date),
                    'items' => $dateGroup->values(),
                    'count' => $dateGroup->count(),
                ];
            })
            ->values();

        $pdfsPaginated->setCollection($pdfsGrouped);



        /*
        |--------------------------------------------------------------------------
        | ANNOUNCEMENTS (Light Query)
        |--------------------------------------------------------------------------
        */

        $announcements = Cache::remember('home_announcements', 600, function () {
            return Announcement::select(['id','title','date','created_at'])
                ->where('ishome', 'Yes')
                ->orderByDesc('date')
                ->limit(10)
                ->get();
        });



        return view('user.index', compact(
            'audiosPaginated',
            'videosPaginated',
            'pdfsPaginated',
            'announcements'
        ));
    }
    public function about(Request $request)
    {
        return view('user.about');
    }
    public function contact(Request $request)
    {
        return view('user.contact');
    }

//audioMenu
    public function audioMenuCategory($url)
    {
        $menu = MainMenu::where('title', $url)->pluck('id')->first();
        $title = $url;
//        $menu = MainMenu::where('slug', $url)->pluck('id')->first();
        $category = Category::where('ref_id', $menu)->select('id', 'category_name', 'category_url', 'title' ,'image','language')->get();
        return view('user.menu-category', compact('category', 'title'));
    }

    public function blog(Request $request)
    {
        $query = Blog::where('isBlog', 'Yes');

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;

            $query->where(function($q) use ($searchTerm) {
                $q->where('post_lable', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('blog_heading', 'LIKE', "%{$searchTerm}%");
//                    ->orWhere('post_detail', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Category filter
        if ($request->filled('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        // Sort options
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'popular':
                $query->orderBy('views', 'DESC');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'ASC');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        // Paginate results
        $blogs = $query->paginate(9)->withQueryString();

        // Get all categories
        $categories = Blogcategory::select('name','id')->get();

        return view('user.blog', compact('blogs', 'categories'));
    }

    public function blogDetails($id) {
        $blog = Blog::where('isBlog', 'Yes')->findOrFail($id);

        // Increment view count
        $blog->increment('views');

        // Get related blogs (same category)
        $relatedBlogs = Blog::where('isBlog', 'Yes')
            ->where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        // Get popular blogs for sidebar
        $popularBlogs = Blog::where('isBlog', 'Yes')
            ->where('id', '!=', $blog->id)
            ->orderBy('views', 'DESC')
            ->limit(5)
            ->get();

        // Load Comments


        $blogcomments = Comment::where('blog_id', $blog->id)->latest()->get();

//        return json_decode($blogcomments);

        return view('user.blog-detail', compact('blog', 'relatedBlogs', 'popularBlogs', 'blogcomments'));
    }

    /*
   |--------------------------------------------------------------------------
   | STORE COMMENT
   |--------------------------------------------------------------------------
   */
    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        $blog = Blog::findOrFail($id);

        Comment::create([
            'blog_id' => $blog->id,
            'name'    => auth()->check() ? auth()->user()->name : 'Guest',
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }


    public function categorywiseData_old(Request $request,  $slug){
        $cacheTime = 60; // seconds (Adjust karein jaise 300 for 5 mins)
        $audioPage = $request->input('audiopage', 1);
        $category = Category::select('id', 'category_name', 'category_url', 'title', 'remark','image', 'language')->where('category_url', $slug)->firstOrFail();
        $title = $category->category_name;
        $audiosPaginated = Cache::remember(
            "category_wise_{$slug}_{$audioPage}",
            $cacheTime,
            function () use ($category) {
                $query = SongMaster::with(['speaker1', 'speaker2', 'category', 'subcategory'])
                    ->where('category_id', $category->id)
                    ->where('status', 'Yes')
                    ->where('ishome', 'Yes')
                    ->whereNotNull('publish_date')
                    ->orderBy('publish_date', 'DESC');

                $paginated = $query->paginate(10, ['*'], 'audiopage');

                $grouped = $paginated->getCollection()
                    ->groupBy(function ($item) {
                        return Carbon::parse($item->publish_date)->format('Y-m-d');
                    })
                    ->map(function ($dateGroup) {
                        return [
                            'date'  => Carbon::parse($dateGroup->first()->publish_date),
                            'items'=> $dateGroup,
                            'count'=> $dateGroup->count(),
                        ];
                    });

                $paginated->setCollection(collect($grouped));
                return $paginated;
            }
        );

        return view('user.category-wise-data', compact('audiosPaginated', 'title', 'category'));
    }

    public function categorywiseData(Request $request, $slug)
    {
        $cacheTime = 300; // 5 minutes (60 bahut kam hai)
        $audioPage = $request->input('audiopage', 1);

        $category = Category::select(
            'id', 'category_name', 'category_url',
            'title', 'remark', 'image', 'language'
        )->where('category_url', $slug)->firstOrFail();

        $title = $category->category_name;

        $search   = $request->input('search');
        $sortBy   = $request->input('sort_by', 'date_desc');
        $language = $request->input('language');

        $audiosPaginated = Cache::remember(
            "category_wise_{$slug}_{$audioPage}_" . md5(json_encode($request->all())),
            $cacheTime,
            function () use ($category, $search, $sortBy, $language) {

                $query = SongMaster::query()
                    ->select([
                        'id','title','song','category_id','subcategory_id',
                        'publish_date','language','speaker1_id','speaker2_id',
                        'attach_pic','class_date','murli_date','audience_place_event'
                    ])
                    ->where('category_id', $category->id)
                    ->where('status', 'Yes')
                    ->where('ishome', 'Yes')
                    ->whereNotNull('publish_date');

                /* 🔍 SEARCH FILTER */
                if ($search) {
                    $query->where('title', 'LIKE', "%{$search}%");
                }

                /* 🌐 LANGUAGE FILTER */
                if ($language) {
                    $query->where('language', $language);
                }

                /* 🔃 SORTING */
                match ($sortBy) {
                    'date_asc'   => $query->orderBy('publish_date', 'ASC'),
                    'title_asc'  => $query->orderBy('title', 'ASC'),
                    'title_desc' => $query->orderBy('title', 'DESC'),
                    default      => $query->orderBy('publish_date', 'DESC'),
                };

                /* 🚀 PAGINATION FIRST (FAST) */
                $paginated = $query->paginate(10, ['*'], 'audiopage');

                /* ⚡ LAZY LOAD relations AFTER pagination */
                $paginated->getCollection()->load([
                    'speaker1:id,name',
                    'speaker2:id,name',
                    'category:id,category_name,setforall_audio',
                    'subcategory:id,subcategory_name,setforall_audio',
                ]);

                /* 📅 GROUPING (Lightweight) */
                $grouped = $paginated->getCollection()
                    ->groupBy(fn ($item) =>
                    Carbon::parse($item->publish_date)->format('Y-m-d')
                    )
                    ->map(fn ($dateGroup) => [
                        'date'  => Carbon::parse($dateGroup->first()->publish_date),
                        'items'=> $dateGroup,
                        'count'=> $dateGroup->count(),
                    ]);

                $paginated->setCollection($grouped);

                return $paginated;
            }
        );

        return view('user.category-wise-data', compact('audiosPaginated', 'title', 'category'));
    }
    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        DB::table('newsletter_subscribers')->insert([
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
