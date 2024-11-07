<?php

use Livewire\Livewire;
use App\Livewire\Authentication\AddUser;
use App\Models\User;
use function Pest\Laravel\actingAs;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

//this test checks if the website correctly handles the password confirmation
it('performs real time password confirmation validation', function () {
    // Arrange
    $password = fake()->password(); // Generate a random password
    $passwordConfirmation = fake()->password(); // Generate a random password confirmation

    // Act
    Livewire::test(AddUser::class)
        ->set('password', $password)
        ->set('password_confirmation', 'different') // Set incorrect confirmation
        ->assertHasErrors(['password_confirmation'])

        ->set('password_confirmation', $password) // Correct the confirmation
        ->assertHasNoErrors(['password_confirmation']);
});


it('creates user as left child when parent has no children', function () {
    // Create parent user
    $parentUser = User::factory()->create([
        'level' => 0,
        'position' => null,
        'parent_id' => null
    ]);

    $this->actingAs($parentUser);

    // Generate dynamic user data using Faker
    $username = fake()->unique()->userName(); // Generates a unique username
    $name = fake()->name();
    $email = fake()->unique()->safeEmail();
    $phone = fake()->phoneNumber();
    $password = 'password123'; // This can be static as it doesn't affect uniqueness


    Livewire::test(AddUser::class)
        ->set('username', $username)
        ->set('name', $name)
        ->set('email', $email)
        ->set('phone', $phone)
        ->set('password', $password)
        ->set('password_confirmation', $password)
        ->call('getSave');

    $this->assertDatabaseHas('users', [
        'username' => $username,
        'email' => $email,
        'parent_id' => $parentUser->id,
        'position' => 'left',
        'level' => $parentUser->level + 1,
        'usertype' => 'user'
    ]);
});

it('creates user as right child when parent has left child', function () {
    //Arrange
    $parentUser = User::factory()->create([
        'level' => 0,
        'position' => null,
        'parent_id' => null
    ]);

    // Create left child
    User::factory()->create([
        'parent_id' => $parentUser->id,
        'position' => 'left',
        'level' => 1
    ]);

    $this->actingAs($parentUser);
    //Act
     // Generate dynamic user data using Faker
     $username = fake()->unique()->userName(); // Generates a unique username
     $name = fake()->name();
     $email = fake()->unique()->safeEmail();
     $phone = fake()->phoneNumber();
     $password = 'password123'; // This can be static as it doesn't affect uniqueness

    Livewire::test(AddUser::class)
        ->set('username', $username)
        ->set('name', $name)
        ->set('email', $email)
        ->set('phone', $phone)
        ->set('password', $password)
        ->set('password_confirmation', $password)
        ->call('getSave');

    //Assert
    $this->assertDatabaseHas('users', [
        'username' => $username,
        'email' => $email,
        'parent_id' => $parentUser->id,
        'position' => 'right',
        'level' => $parentUser->level + 1,
        'usertype' => 'user'
    ]);
});

it('prevents user creation when parent has both children', function () {
    //Arrange
    $parentUser = User::factory()->create([
        'level' => 0,
        'position' => null,
        'parent_id' => null
    ]);

    // Create both children
    User::factory()->create([
        'parent_id' => $parentUser->id,
        'position' => 'left',
        'level' => 1
    ]);

    User::factory()->create([
        'parent_id' => $parentUser->id,
        'position' => 'right',
        'level' => 1
    ]);

    $this->actingAs($parentUser);

    //Act
    // Generate dynamic user data using Faker
    $username = fake()->unique()->userName();
    $name = fake()->name();
    $email = fake()->unique()->safeEmail();
    $phone = fake()->phoneNumber();
    $password = 'password123';

    Livewire::test(AddUser::class)
        ->set('username', $username)
        ->set('name', $name)
        ->set('email', $email)
        ->set('phone', $phone)
        ->set('password', $password)
        ->set('password_confirmation', $password)
        ->call('getSave');          //ithu vanthu save action ah trigger pannum..  in your Livewire component

    //Assert
    $this->assertDatabaseMissing('users', [
        'username' => $username
    ]);
});




