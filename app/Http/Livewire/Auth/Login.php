<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use App\Models\User;

class Login extends Component
{
    use WithFileUploads;

    public $user;
    public $full_name;
    public $avator;
    public $email;
    public $no_hp;
    public $username;
    public $password;

    // protected $rules = [
        // 'full_name' => 'required',
        // 'avator' => 'image|max:1024',
        // 'username' => 'required|unique:users,username',
        // 'password' => 'required|min:6'
    // ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function login()
    {
        // $validatedData = $this->validate();
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if ((Auth::attempt(array('username' => $this->username, 'password' => $this->password, 'email_verified_at' => null)))) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error',  'message' => 'Akun anda belum di verifikasi!']);
        }elseif(Auth::attempt(array('username' => $this->username, 'password' => $this->password))){
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'Logged in successfully!']);
            return redirect()->to('/home');
        }else{
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error',  'message' => 'Wrong login credentials!']);
        }
    }

    public function signUp()
    {
        // $validatedData = $this->validate();
        $this->validate([
            'full_name' => 'required',
            'avator' => 'image|max:1024',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|max:13|min:11',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8'
        ]);

        $this->password = Hash::make($this->password);

        $avator = $this->avator;
        $avator = Str::random(10).'.'.$avator->extension();

        $user = User::create([
            'full_name' => $this->full_name,
            'avator' => $avator,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'username' => $this->username,
            'password' => $this->password
        ]);

        // Store file in the public folder
        $this->avator->storeAs('public/avators', $avator);
        $this->clearForm();
        event(new Registered($user));
        $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'Account created successfully!']);
                
        return redirect()->to('/');
    }

    public function clearForm ()
    {
        $this->full_name = "";

        $this->avator = "";

        $this->email = "";

        $this->no_hp = "";

        $this->username = "";

        $this->password = "";
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}