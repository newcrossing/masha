<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Mail\NotifyMail;
use App\Mail\OrderShipped;
use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use JeroenDesloovere\VCard\VCard;
use Mail;
use Validator;


class BoardController extends Controller
{

    /**
     * Генерирует для скачивания  vcard
     * @param $id
     */
    public function vcard($id)
    {
        $board = Board::where('slug', '=', $id)->firstOrFail();
        $user = $board->user;

        $vcard = new VCard();

        $lastname = ($user->name) ?: $user->login;

        $vcard->addName($lastname);

        $vcard->addCompany('Маша-растеряша.рф');
        $vcard->addEmail($user->email);

        if ($user->tel) {
            $vcard->addPhoneNumber($user->tel, 'PREF;WORK');
        }
        if ($user->tel2) {
            $vcard->addPhoneNumber($user->tel2, 'WORK');
        }

        $vcard->addURL('https://маша-растеряша.рф');
        if ($user->vk) {
            $vcard->addURL('https://vk.com/' . $user->vk);
        }

        if ($user->instagram) {
            $vcard->addURL('https://www.instagram.com/' . $user->instagram);
        }
        //$vcard->addPhoto(__DIR__ . '/landscape.jpeg');

// return vcard as a string
//return $vcard->getOutput();

// return vcard as a download

        return response($vcard->getOutput())
            ->header('Content-Type', 'text/vcard')
            ->header('Content-disposition', 'attachment; filename="' . $user->login . '.vcf"');
        //return $vcard->download();
    }

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);

        if ($validator->passes()) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text,
            ];
            Mail::to(User::find($request->id)->email)->send(new NotifyMail($data));
            Activity::add('Отправлено сообщение на почту о находке');
            return response()->json(['success' => 'Сообщение отправлено']);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    /***
     * Обработка заказа в один клик с главной
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendorder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tel' => 'required',
            'check' => 'required',
        ]);

        if ($validator->passes()) {
            $data = [
                'name' => $request->name,
                'tel' => $request->tel,
                'text' => $request->text,
            ];

            Mail::to(env('MAIL_SUPPORT', 'support@masha-rasteryasha.online'))
                ->send(new OrderShipped($data));
            Activity::add('Выполнен заказ на сайте');
            return response()->json(['success' => 'Заказ отправлен']);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function single($id)
    {
        $board = Board::find($id);
        return view('frontend.board.index', compact('board'));
    }

    public function qr($slug)
    {
        $board = Board::where('slug', $slug)->firstOrFail();
        if (!$board->user->email || !$board->user->last_password) {
            // если не указан email или не сменили пароль показать 404
            abort(404);
        }
        return view('frontend.board.index', compact('board'));
    }

    public function list()
    {
        $boards = Board::where('user_id', Auth::user()->id)->limit(1)->get();
        return view('frontend.board.list', compact('boards'));
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        $board = $user->board;

        return view('frontend.board.edit', compact('user', 'board'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|max:2000|mimes:jpeg,png,bmp',
        ], [
            'image.max' => 'Максимальный размер фото 2 Мб!',
        ]);


        $board = Board::find($id);
        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            $thumbnail = Image::make($request['image']);
            $thumbnail->widen(1400);
            $thumbnail->save(Storage::path('/public/boards/1400/') . $newFileName);
            $thumbnail = Image::make($request['image']);
            $thumbnail->widen(200);
            $thumbnail->save(Storage::path('/public/boards/200/') . $newFileName);
            $board->fotos()->create(['file' => $newFileName]);
        }
        $board->name = $request->name;
        $board->money = $request->money;
        $board->text = $request->text;
        $board->save();
        Activity::add('Пользователь изменил объявление');
        return redirect()->back()->with('success', 'Сохранено');
    }

    public function create()
    {
        $boards = new Board();
        return view('frontend.board.edit', compact('boards'));
    }

    public function insert(Request $request)
    {
        // TODOO Удалить этот блок?
        /*  $request->validate([
              'name' => 'required|max:255|min:3'
          ], [
              'name.required' => 'Название должно быть заполнено!',
              'name.min' => 'Минимальная длина поля 3 символа!',
              'name.max' => 'Максимальная длина поля 255 символов!',
          ]);*/
        $board = new Board();

        $board->name = $request->name;
        $board->money = $request->money;
        $board->text = $request->text;
        $board->user_id = Auth::user()->id;
        $board->save();
        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            $thumbnail = Image::make($request['image']);
            $thumbnail->widen(1400);
            $thumbnail->save(Storage::path('/public/boards/1400/') . $newFileName);
            $thumbnail = Image::make($request['image']);
            $thumbnail->widen(200);
            $thumbnail->save(Storage::path('/public/boards/200/') . $newFileName);
            $board->fotos()->create(['file' => $newFileName]);
        }

        //Log::info('Дата ' . $post->date_public);
        return redirect()->route('board.edit', $board->id)->with('success', 'Объявление добавлено.');
    }
}
