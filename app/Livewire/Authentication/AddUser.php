<?php

namespace App\Livewire\Authentication;

use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use CommonTrait;
    use WithFileUploads;

    public $username;
    public $name;
    public $email;
    public $phone;
    public $usertype;
    public $parent_id;

    public function getSave()
    {
        $level = 0;
        $position = null;

        if (auth()->id()) {
            $parent = User::findOrFail(auth()->id());
            $level = $parent->calculateLevel() + 1;

            if ($parent->children()->where('position', 'left')->exists()) {
                if (!$parent->children()->where('position', 'right')->exists()) {
                    $position = 'right';
                }else{
                 $this->showEditModal=false;
                }
            } else {
                $position = 'left';
            }
        }

        if ($this->username != '') {
            $obj=User::create([
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'usertype' => 'user',
                'parent_id' => auth()->id(),
                'level' => $level,
                'position' => $position,
                'password'=> bcrypt('123456789'),
            ]);
            $message = "Created a new user with username '{$this->username}'.";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        $this->userDetail($obj);
    }

    public function userDetail($obj)
    {
        dd($obj);
    }
    public function clearFields():void
    {
        $this->username = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->usertype = '';
        $this->parent_id = '';
    }

    public function render()
    {
        return view('livewire.authentication.add-user');
    }
}
