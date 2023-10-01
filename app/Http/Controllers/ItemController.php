<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ItemController extends Controller
{
    public function index()
    {
        $items = Store::all();
        return view('index', compact('items'));
    }

    public function general(Request $request)
    {
        $user = Auth::user();
        $dealers = User::role('dealer')->get();
        $keyword = $request->input('keyword');
        $items = Store::query();

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }

        $items = $items->get();
        $itemCount = $items->count();
        $isDealer = $dealers->contains($user);

        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
public function page1(Request $request)
    {
        $user = Auth::user();
        $dealers = User::role('dealer')->get();
        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Бумага/плёнки/наклейки');
        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();
        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }


    public function page2(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Девелопер');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }

    public function page3(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - аксессуары (смазки, салфетки, фильтры, шнуры  и др.)');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }

    public function page4(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - аппаратные (ролики, шестерни, втулки, лампы, шлейфы и др.)');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page5(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - комплектующие корпусные к лаз. Картриджам');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page6(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - лезвия, ракеля');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page7(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - валы магнитные, валы заряда');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page8(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - термоблока (валы тефлоновые, резиновые, термопленки, бушинги и др.)');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page9(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();
        $keyword = $request->input('keyword');
        $items = Store::where('section', 'ЗИП - чипы');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();
        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
    public function page10(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Картриджи к лазерным принтерам');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page11(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Картриджи к матричным принтерам, лента красящая');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page12(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Картриджи к струйным принтерам');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page13(Request $request)
    {           $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Тонер');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page14(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Тонер к цветным принтерам/копирам');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page15(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Фотобарабаны');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page16(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Чернила для струйных принтеров');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page17(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Чернила для лазерных принтеров');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }public function page18(Request $request)
    {        $user = Auth::user();
        $dealers = User::role('dealer')->get();

        $keyword = $request->input('keyword');
        $items = Store::where('section', 'Чернила для матричных принтеров');

        if ($keyword) {
            $keywords = explode(' ', $keyword);
            $items = $items->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subquery) use ($word) {
                        $subquery->whereRaw('LOWER(name) LIKE ?', ["%$word%"])
                                 ->orWhereRaw('LOWER(description) LIKE ?', ["%$word%"]);
                    });
                }
            });
        }else{
            $keyword = "";
        }

        $items = $items->get();
        $itemCount = $items->count();

        $isDealer = $dealers->contains($user);
        return view('page1', compact('user', 'items', 'keyword', 'itemCount', 'isDealer'));
    }
}
