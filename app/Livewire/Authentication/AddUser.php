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
    public $password;
    public $password_confirmation;
    public $usertype;
    public $parent_id;


    public function updatedPasswordConfirmation()
    {
        // Check if passwords match as user types in the confirm password field
        if ($this->password !== $this->password_confirmation) {
            $this->addError('password_confirmation', 'Password and Confirm Password do not match.');
        } else {
            $this->resetErrorBag('password_confirmation'); // Clear the error if passwords match
        }
    }
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
                } else {
                    $this->showEditModal = false;
                    return; // Exit if both positions are filled
                }
            } else {
                $position = 'left';
            }
        }

        if ($this->username != '') {
            // Final check that password and confirmation match before saving
            if ($this->password !== $this->password_confirmation) {
                $this->addError('password_confirmation', 'Password and Confirm Password do not match.');
                return;
            }

            // Clear the error if passwords match
            $this->resetErrorBag('password_confirmation');

            // Proceed with user creation
            $obj = User::create([
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'usertype' => 'user',
                'parent_id' => auth()->id(),
                'level' => $level,
                'position' => $position,
                'password' => bcrypt($this->password), // Encrypt the password
            ]);

            $this->dispatch('notify', ['type' => 'success', 'content' => 'User created successfully']);
            // $this->userDetail($obj);
        }
    }

//    public function userDetail($obj)
//    {
//        dd($obj);
//    }

    public function clearFields(): void
    {
        $this->username = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->usertype = '';
        $this->parent_id = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.authentication.add-user');
    }
}
