<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\Auth as LivewireAuth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;
use App\Models\Friend;
use Symfony\Component\HttpFoundation\Response;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Session;
use Auth;


class Home extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $noChat = false;

    public $avator;
    public $receiver;
    public $current_user;
    public $message;
    public $media;
    public $thread;
    public $receiver_id;
    public $notification;
    public $friend_req;
    public $full_name;
    public $username;
    public $email;
    public $no_hp;
    public $bio;
    public $current_password;
    public $password;
    public $password_confirmation;
    public $cari_pesan;

    protected $rules = ['message' => 'required'];
    protected $queryString = ['cari_pesan'=> ['except' => '']];

    public function startChat($id)
    {
        $this->noChat = true;

        $this->receiver = $id;

        $this->current_user = Auth::user()->id;

        // change to chat read
        $notifications = Message::where('thread', $this->current_user.'-'.$this->receiver)->orWhere('thread', $this->receiver.'-'.$this->current_user)->update(['is_read' => '1']);

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendChat ()
    {
        $this->validate();

        $thread_value = $this->current_user . '-' .$this->receiver;

        if($this->thread = 0){
            Message::create([
                'thread' => $thread_value,
                'message' => $this->message,
                'receiver_id' => $this->receiver,
                'sender_id' => $this->current_user
            ]);
        }else{
            Message::create([
                'thread' => $thread_value,
                'message' => $this->message,
                'receiver_id' => $this->receiver,
                'sender_id' => $this->current_user
            ]);
        }

        $this->clearForm();

    }

    public function clearForm ()
    {
        $this->message = "";
        $this->avator = "";
        $this->current_password = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

    public function back()
    {
        return redirect()->to('/home');
    }

    public function logout ()
    {
        Session::flush();

        Auth::logout();

        return redirect()->to('/');
    }

    public function addFriend ($id)
    {
       Friend::create(['friend' => $id, 'user' => Auth::user()->id]);
    //    $this->receiver = $id;
    //    $this->current_user = Auth::user()->id;

    //    $req_friend = Friend::where('friend', $this->current_user)->orWhere('user', $this->receiver)->update(['status' => 'sukses']);
    }
    
    public function removeFriend ($id)
    {
        Friend::where(['friend' => $id, 'user' => Auth::user()->id])->delete();
    }


    public function editProfile($id)
    {
        $this->validate([
            'full_name' => 'required',
            'username' => 'required',
        ]);

        $avator = $this->avator;

        if ($this->avator != null) {
            $file = Str::random(10).'.'. $avator->extension();
            if($id){
                $edit = User::find($id);
    
                if ($edit) {
                    $edit->update([
                        'avator' => $file,
                        'full_name' => $this->full_name,
                        'username' => $this->username,
                        'email' => $this->email,
                        'no_hp' => $this->no_hp,
                        'bio' => $this->bio
                    ]);
                }
            }
            
            $this->avator->storeAs('public/avators', $file);
        }else{
            if($id){
                $edit = User::find($id);
    
                if ($edit) {
                    $edit->update([
                        'full_name' => $this->full_name,
                        'username' => $this->username,
                        'email' => $this->email,
                        'no_hp' => $this->no_hp,
                        'bio' => $this->bio
                    ]);
                }
            }
        }
        $this->alert('success', 'Data berhasil diupdate!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        
        
        $this->show();
    }

    public function show()
    {
        $data = User::where('id', Auth::user()->id)->first();
        $this->full_name = $data->full_name;
        $this->username = $data->username;
        $this->email = $data->email;
        $this->no_hp = $data->no_hp;
        $this->bio = $data->bio;
    }

    public function changePassword()
    {
        $this->validate([
            'current_password'=>'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            $this->alert('success', 'Password berhasil diupdate!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->clearForm();
            // Auth::logout();

            // return redirect()->to('/');
        }
        else
        {
            $this->alert('error', 'Password lama tidak sesuai', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->clearForm();
        }
        
    }

    public function deleteMessage ($id)
    {
        Message::find($id)->update(['message' => null]);

    }

    public function clearChats ()
    {
        // All variables
        $user = Auth::user()->id;

        $receiver = $this->receiver;

        $get_messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();

        // Favorite::where('message', $get_messages)->destroy();
        foreach($get_messages as $message){
            $message->delete();
        }
    }

    public function render()
    {
        if ($this->cari_pesan !== null) {
            $cari_pesan = User::where('full_name','like', '%' . $this->cari_pesan . '%')
                            ->latest();
        }

        $user = Auth::user()->id;
        $receiver = $this->receiver;
        $current = User::find($receiver);
        $users = User::where('id', '!=', $user)->get();
        $list = Friend::where('friend','!=',$user)->orWhere('user','==',$user)
                        ->with('list_teman')
                        ->get();
        $noFriends = User::where('id', '!=', $user)->with('wolak')->get();
        $profile = User::where('id', $user)->get();
        $friend = Friend::where('friend', $current)->first();
        $teman_req = Friend::where('user', $user)->get();
        $messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();
        return view('livewire.home',compact('messages', 'users', 'current','profile','friend','teman_req','list','noFriends'))->extends('home')->section('content');
    }
}
